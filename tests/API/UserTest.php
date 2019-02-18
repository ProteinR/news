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

class TagTest extends TestCase
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

    public function test_index_tag()
    {
        $response = $this->json('GET', '/api/tag');

        $response->assertOk();
    }

    public function test_store_tag()
    {
        $tag = str_random(10);

        $response = $this->json('POST', '/api/tag',
            [
                'title'        => $tag,
            ]);

        $response->assertOk();
    }

    public function test_update_tag()
    {
        $tag = Tag::create(['title'=>str_random(10)]);

//        $tag = $this->json('POST', '/api/tag',
//            [
//                'title' => $tag,
//            ]);

        $response = $this->json('PUT', '/api/tag/'.$tag->id,
            [
                'title' => $tag.'upd',
            ]);

        $response->assertOk();
    }

    public function test_delete_tag()
    {
        $tag = Tag::create(['title'=>str_random(10)]);
        $response = $this->json('DELETE', '/api/tag/' . $tag->id);
        $response->assertStatus(204);
    }

}
