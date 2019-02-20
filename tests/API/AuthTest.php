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
        $this->user = factory(User::class)->make([
            'api_token' => 'test',
            'password'  => Hash::make('test'),
        ]);
    }

    public function test_login()
    {
        //refister new user
        $this->json('POST', '/api/auth/account',
            [
                'name'                  => $this->user->name,
                'email'                 => $this->user->email,
                'password'              => 'test',
                'password_confirmation' => 'test',
            ]);

        //login into new user
        $response = $this->json('POST', '/api/auth/token',
            [
                'email'    => $this->user->email,
                'password' => 'test',
            ]);

        $response->assertOk()->assertJsonFragment([
            'name'  => $this->user->name,
            'email' => $this->user->email,
        ]);
    }

    public function test_register()
    {
        //register new user
        $response = $this->json('POST', '/api/auth/account',
            [
                'name'                  => $this->user->name,
                'email'                 => $this->user->email,
                'password'              => 'test',
                'password_confirmation' => 'test',
            ]);

        $response->assertOk()->assertJsonFragment([
            'message' => 'User created successfully',
            'name'    => $this->user->name,
            'email'   => $this->user->email,
        ]);
    }
}
