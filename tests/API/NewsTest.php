<?php

namespace Tests\Feature;

use App\Category;
use App\News;
use App\Tag;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class NewsTest extends TestCase
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

    /**
     * A basic test example.
     * @return void
     */
    public function testNewsIndexTest()
    {
        $response = $this->json('GET', '/api/news');

        $response->assertOk();
    }

    public function test_store_news()
    {
        $category = Category::first();
        $tags = Tag::first();
        $news = factory(News::class)->make(['category_id' => $category->id]);
        $response = $this->json('POST', '/api/news',
            [
                'category_id' => $category->id,
                'title'       => $news->title,
                'text'        => $news->text,
                'tags'        => $tags->id,
            ]);

        $response->assertOk();
    }

    public function test_update_news()
    {
        $category = Category::find(2);
        $tags = Tag::find([1, 2, 3])->pluck('id');
        $news = factory(News::class)->make(['user_id' => $this->user->id]);
        $news->save();

        $response = $this->json('PUT', '/api/news/' . $news->id,
            [
                'category_id' => $category->id,
                'title'       => $news->title . 'upd',
                'text'        => $news->title . 'upd',
                'tags'        => $tags,
            ]);

        $response->assertStatus(200);
    }

    public function test_delete_news()
    {
        $news = factory(News::class)->make();
        $news->save();
        $response = $this->json('DELETE', '/api/news/' . $news->id);

        $response->assertStatus(204);
    }

    public function test_show_news()
    {
        $news = factory(News::class)->make(['user_id' => $this->user->id]);
        $news->save();
        $response = $this->json('GET', '/api/news/' . $news->id);

        $response->assertStatus(200);
    }
}
