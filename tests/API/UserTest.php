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

class UserTest extends TestCase
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

    public function test_update_user()
    {
        //register new user
        $this->json('POST', '/api/auth/account',
            [
                'name'                  => $this->user->name,
                'email'                 => $this->user->email,
                'password'              => 'test',
                'password_confirmation' => 'test',
            ]);

        //get new user and login
        $this->user = User::where('email', $this->user->email)->first();
        $this->actingAs($this->user, 'api');

        //try to update user information
        $response = $this->json('PUT', '/api/user/'.$this->user->id,
            [
                'name'                  => $this->user->name . 'upd',
                'email'                 => $this->user->email,
                'password'              => '123456',
                'password_confirmation' => '123456',
            ]);
        $response->assertOk();
    }

    public function test_delete_user()
    {
        //create new user and register
        $this->json('POST', '/api/auth/account',
            [
                'name'                  => $this->user->name,
                'email'                 => $this->user->email,
                'password'              => 'test',
                'password_confirmation' => 'test',
            ]);

        //get new user and login
        $this->user = User::where('email', $this->user->email)->first();
        $this->actingAs($this->user, 'api');

        //try to delete this user
        $response = $this->json('DELETE', '/api/user/'.$this->user->id);
        $response->assertStatus(204);
    }

    public function test_show_user()
    {
        //register new user
        $this->json('POST', '/api/auth/account',
            [
                'name'                  => $this->user->name,
                'email'                 => $this->user->email,
                'password'              => 'test',
                'password_confirmation' => 'test',
            ]);
        //get new user
        $this->user = User::where('email', $this->user->email)->first();
        $this->actingAs($this->user, 'api');

        //try to show user
        $response = $this->json('GET', '/api/user/'.$this->user->id);
        $response->assertOk();
    }

}
