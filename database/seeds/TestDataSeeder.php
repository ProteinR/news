<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);

        DB::transaction(function () {
            $users = $this->createUsers();
            $news = $this->createNews($users);
            $comments = $this->createComments($news);
            $this->createNewsTags($news);

        });
        $this->call(RolesPermissionTableSeeder::class);

    }

    public function createUsers()
    {
        // Create admin
        User::create([
            'name' => 'Admin Adminov',
            'email' => 'a@a.a',
            'password' => Hash::make('123456'),
            'avatar' => 'https://lorempixel.com/50/50/people/?21613',
            'api_token' => '1234567890',
        ]);


        // Create all users
        return factory(\App\User::class, 4)->create();
    }

    protected function createNews($users)
    {
        $users->each(function ($user) {
            $news = factory(\App\News::class, 2)->create(['user_id' => $user->id]);
//            $user->news()->saveMany($news);

        });

        return \App\News::all();
    }

    protected function createComments($news)
    {
        $news->each(function ($post) {
            $comments = factory(\App\Comment::class, 3)->create(['news_id' => $post->id]);
        });

        return \App\Comment::all();
    }

    protected function createNewsTags($news)
    {
        $news->each(function ($post) {
            for ($i=0; $i<rand(1,4); $i++) {
                DB::table('news_tags')->insert([
                    'news_id' => $post->id,
                    'tag_id'  => rand(1,4)
                ]);
            }

        });

        return DB::table('news_tags')->get();
    }
}
