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
        $recordsList = $mongodbLogger->index([], ['sort' => ['time' => -1]]);

        $logs = [];

        foreach ($recordsList as $record) {
            $log = $record->getArrayCopy();
            $logs[] = [
                'time' => (($log['time']) instanceof \MongoDB\Model\BSONDocument) ? date('M d, Y  H:i:s',$log['time']->getArrayCopy()['time']) : date('M d, Y H:i:s',$log['time']),
                'page' => (($log['page']) instanceof \MongoDB\Model\BSONDocument) ? $log['page']->getArrayCopy()['page'] : $log['page'],
            ];

        }

        return view('logger::summary', compact('logs'));
    }
}
