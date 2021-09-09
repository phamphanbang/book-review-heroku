<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            [
                'title' => 'Fantasy',
                'parent_id' => 0,
                'description' => 'While usually set in a fictional imagined world fantasy books include prominent elements of magic , mythology , or the supernatural'
            ],
            [
                'title' => 'Literary Fiction',
                'parent_id' => 0,
                'description' => 'literary fiction refers to the perceived artistic writing style of the author. Their prose is meant to evoke deep thought through stories that offer personal or social commentary on a particular theme.'
            ],
            [
                'title' => 'Self-Help',
                'parent_id' => 0,
                'description' => 'Whether the focus is on emotional well-being, finances, or spirituality, self-help books center on encouraging personal improvement and confidence in a variety of facets of your life.'
            ],
            [
                'title' => 'Computer Science',
                'parent_id' => 0,
                'description' => 'Computer science is the scientific and practical approach to computation and its applications.'
            ],
            [
                'title' => 'Fantasy child 1 ',
                'parent_id' => 1,
                'description' => 'child',
            ],
            [
                'title' => 'Fantasy child 2 ',
                'parent_id' => 1,
                'description' => 'child',
            ],
            [
                'title' => 'Fantasy child 3 ',
                'parent_id' => 1,
                'description' => 'child',
            ],
        ]);
    }
}
