<?php

namespace Influencers\Logger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoggerController extends Controller
{
    public function logPage(Request $request, MongodbLogger $mongodbLogger)
    {
        $path = $request->path();
        $pageRequest = array('page' => $path);
        $mongodbLogger->insert([
            'time' => strtotime("now"),
            'page' => $pageRequest,
            'coming-from' => !empty($request->input('src')) ? $request->input('src') : '',
            ]);

        if($path == 'page-404') {
            $message = _('Page not found');
            return response()->view('logger::error', compact('message'), 404);
        }
        elseif($path == 'page-403') {
            $message = _('Access Forbidden');
            return response()->view('logger::error', compact('message'), 403);
        }
        return view('logger::main');
    }

    public function summary(MongodbLogger $mongodbLogger) {
        $recordsList = $mongodbLogger->index();

        $logs = [];

        foreach ($recordsList as $record) {
            $logs[] = $record->getArrayCopy();
        }
        print_r($logs);exit;

        return view('logger::summary', compact('logs'));
    }
}
