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
            ['title' => 'Спорт', 'order' => 1],
            ['title' => 'Авто', 'order' => 2],
            ['title' => 'Финансы', 'order' => 3],
            ['title' => 'IT', 'order' => 4],
        ]);
    }
}
