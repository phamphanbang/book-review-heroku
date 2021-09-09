<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'Pham Phan Bang',
            'email' => 'Phamphanbang@gmail.com',
            'image' => 'default.jpg',
            'password' => Hash::make('123456789'),
        ],[
            'name' => 'Minh Tran',
            'email' => 'Minh@gmail.com',
            'image' => 'default.jpg',
            'password' => Hash::make('123456789'),
        ]]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'image' => 'default.jpg',
            'password' => Hash::make('123456789'),
            'role' => 'admin'
        ]);
    }
}
