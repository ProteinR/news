<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_tags')->insert([
            ['news_id' => rand(1,5),
             'tag_id' => rand(1,5)
            ],
            ['news_id' => rand(1,5),
             'tag_id' => rand(1,5)
            ],
            ['news_id' => rand(1,5),
             'tag_id' => rand(1,5)
            ],
        ]);
    }
}
