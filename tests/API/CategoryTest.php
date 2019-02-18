<?php

namespace Tests\Feature;

use App\Category;
use App\Comment;
use App\News;
use App\Tag;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create([
            'api_token' => 'test',
            'password'  => Hash::make('test'),
        ]);

        $this->actingAs($this->user, 'api');
    }

    public function test_index_category()
    {
        $response = $this->json('GET', '/api/category');

        $response->assertOk();
    }

    public function test_store_category()
    {
        $response = $this->json('POST', '/api/category',
            [
                'title' => str_random(15),
                'order' => rand(1,4)
            ]);

        $response->assertOk();
    }

    public function test_update_category()
    {
        $category = Category::create(['title' => str_random(15), 'order' => rand(1,4)]);
//        $this->json('POST', '/api/category',
//            [
//                'title' => str_random(15),
//                'order' => rand(1,4)
//            ]);
        $response = $this->json('PUT', '/api/category/'.$category->id, [
            'title' => $category->title . 'upd',
            'order' => '2',
        ]);
        $response->assertOk();
    }

    public function test_delete_category()
    {
        $category = Category::create(['title' => str_random(15), 'order' => rand(1,4)]);

        $response = $this->json('DELETE', '/api/category/'.$category->id);

        $response->assertStatus(204);
    }

}
