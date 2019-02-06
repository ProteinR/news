<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'name' => str_random(5),
//            'email' => str_random(10).'@gmail.com',
//            'password' => bcrypt('123456'),
//        ]);

        factory(App\User::class, 50)->create();
    }
}
