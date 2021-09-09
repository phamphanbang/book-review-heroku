<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity_type')->insert([
            [
                'id' => 1,
                'type' => 'read'
            ],
            [
                'id'=> 2,
                'type' => 'unread'
            ],
            [
                'id' => 3,
                'type' => 'reading'
            ],
            [
                'id'=> 4,
                'type' => 'unreading'
            ],
            [
                'id' => 5,
                'type' => 'favorite'
            ],
            [
                'id' => 6,
                'type' => 'unfavorite'
            ]
        ]);
    }
}
