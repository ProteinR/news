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

class CommentsTest extends TestCase
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

    public function test_store_comment()
    {
//        $news = factory(News::class)->create();
        $comment = factory(Comment::class)->make();
        $response = $this->json('POST', '/api/comment', $comment->toArray());
        $response->assertOk();
    }

    public function test_update_comment()
    {
        $comment = factory(Comment::class)->create();
        $response = $this->json('PUT', '/api/comment/'.$comment->id,
            [
                'text'        => $comment->text . 'upd',
            ]);
        $response->assertOk();
    }

    public function test_delete_comment()
    {
        $comment = factory(Comment::class)->create();
        $response = $this->json('DELETE', '/api/comment/'.$comment->id);
        $response->assertStatus(204);
    }

}
