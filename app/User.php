<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function news()
    {
        return $this->hasMany(News::Class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::Class);
    }

    public function generateApiKey()
    {
        do {
            $this->api_token = str_random(10);
        }while($this->where('api_token', $this->api_token)->exists());

        $this->save();
    }


}
