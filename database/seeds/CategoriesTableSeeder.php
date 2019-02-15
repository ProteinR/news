<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['title' => 'Sport', 'order' => 1],
            ['title' => 'Politics', 'order' => 2],
            ['title' => 'Finances', 'order' => 3],
            ['title' => 'Culture', 'order' => 4],
        ]);
    }
}
