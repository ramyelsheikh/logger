<?php

namespace Influencers\Logger;

use Illuminate\Database\Seeder;

class LoggerSeeder extends Seeder
{
    /**
     * Run mongodb seeds.
     *
     * @return void
     */
    public function run(MongodbLogger $mongodbLogger)
    {
        $mongodbLogger->insert([
            'time' => strtotime("now"),
            'page' => 'page1',
        ]);

        $mongodbLogger->insert([
            'time' => strtotime("now"),
            'page' => 'page2',
        ]);

        $mongodbLogger->insert([
            'time' => strtotime("now"),
            'page' => 'page3',
        ]);

        $mongodbLogger->insert([
            'time' => strtotime("now"),
            'page' => 'page4',
        ]);

        $mongodbLogger->insert([
            'time' => strtotime("now"),
            'page' => 'page-404',
        ]);

        $mongodbLogger->insert([
            'time' => strtotime("now"),
            'page' => 'page-403',
        ]);

    }
}
