<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book')->insert([
            [
                'title' => 'Harry Potter and the Sorcerer\'s Stone',
                'publish_at' => '1997-06-26',
                'author' => 'JK Rolling',
                'image' => 'default.jpg',
                'num_of_page' => 309,
                'rate' => 1,
                'quantity' => 10,
                'status' => 1,
                'price' => 10,
            ],
            [
                'title' => 'The Wandering Inn',
                'publish_at' => '2018-08-01',
                'author' => 'Pirateaba',
                'image' => 'default.jpg',
                'num_of_page' => 1158,
                'rate' => 1,
                'quantity' => 13,
                'status' => 1,
                'price' => 12,
            ],
            [
                'title' => 'The Hobbit',
                'publish_at' => '2012-08-30',
                'author' => 'J.R.R. Tolkien',
                'image' => 'default.jpg',
                'num_of_page' => 238,
                'rate' => 1,
                'quantity' => 22,
                'status' => 1,
                'price' => 21,
            ],
            [
                'title' => 'We Begin at the End',
                'publish_at' => '2021-03-02',
                'author' => 'Chris Whitake',
                'image' => 'default.jpg',
                'num_of_page' => 384,
                'rate' => 1,
                'quantity' => 10,
                'status' => 1,
                'price' => 15,
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'publish_at' => '2006-03-23',
                'author' => 'Harper Lee',
                'image' => 'default.jpg',
                'num_of_page' => 324,
                'rate' => 1,
                'quantity' => 12,
                'status' => 1,
                'price' => 23,
            ],
            [
                'title' => 'Don Quixote',
                'publish_at' => '2003-05-23',
                'author' => 'Miguel de Cervantes Saavedra',
                'image' => 'default.jpg',
                'num_of_page' => 1023 ,
                'rate' => 1,
                'quantity' => 12,
                'status' => 1,
                'price' => 5,
            ],
            [
                'title' => 'How to Win Friends and Influence People',
                'publish_at' => '1998-10-01',
                'author' => 'Dale Carnegie',
                'image' => 'default.jpg',
                'num_of_page' => 288,
                'rate' => 1,
                'quantity' => 12,
                'status' => 1,
                'price' => 9,
            ],
            [
                'title' => 'The Gifts of Imperfection',
                'publish_at' => '2010-08-27',
                'author' => 'Brené Brown',
                'image' => 'default.jpg',
                'num_of_page' => 137,
                'rate' => 1,
                'quantity' => 12,
                'status' => 1,
                'price' => 8,
            ],
            [
                'title' => 'Thinking, Fast and Slow',
                'publish_at' => '2011-10-25',
                'author' => 'Daniel Kahneman',
                'image' => 'default.jpg',
                'num_of_page' => 499,
                'rate' => 1,
                'quantity' => 12,
                'status' => 1,
                'price' => 7,
            ],
            [
                'title' => 'You Don\'t Know JS',
                'publish_at' => '2015-04-11',
                'author' => 'Kyle Simpson',
                'image' => 'default.jpg',
                'num_of_page' => 72,
                'rate' => 1,
                'quantity' => 12,
                'status' => 1,
                'price' => 11,
            ],
            [
                'title' => 'Design Patterns for Dummies',
                'publish_at' => '2006-03-01',
                'author' => 'Steven Holzner',
                'image' => 'default.jpg',
                'num_of_page' => 308,
                'rate' => 1,
                'quantity' => 12,
                'status' => 1,
                'price' => 10,
            ],
            [
                'title' => 'Eloquent JavaScript: A Modern Introduction to Programming',
                'publish_at' => '2011-02-03',
                'author' => 'Marijn Haverbeke',
                'image' => 'default.jpg',
                'num_of_page' => 224,
                'rate' => 1,
                'quantity' => 12,
                'status' => 1,
                'price' => 14,
            ]
        ]);
    }
}
