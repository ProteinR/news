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

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    protected $user;

    public function setUp()
    {
        parent::setUp();
//        $this->user = factory(User::class)->create([
//            'api_token' => 'test',
//            'password'  => Hash::make('test'),
//        ]);
//
//        $this->actingAs($this->user, 'api');
    }

    public function test_login()
    {
        $user = factory(User::class)->make();
        $this->json('POST', '/api/auth/account',
            [
                'name'                  => $user->name,
                'email'                 => $user->email,
                'password'              => 'test',
                'password_confirmation' => 'test',
            ]);

        $response = $this->json('POST', '/api/auth/token',
            [
                'email'    => $user->email,
                'password' => 'test',
            ]);

        $response->assertOk()->assertJsonFragment([
            'name'  => $user->name,
            'email' => $user->email,
        ]);
    }

    public function test_register()
    {
        $user = factory(User::class)->make();
        $response = $this->json('POST', '/api/auth/account',
            [
                'name'                  => $user->name,
                'email'                 => $user->email,
                'password'              => 'test',
                'password_confirmation' => 'test',
            ]);

        $response->assertOk()->assertJsonFragment([
            'message' => 'User created successfully',
            'name'    => $user->name,
            'email'   => $user->email,

        ]);
    }
}
