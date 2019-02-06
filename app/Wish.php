<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    protected $fillable = ['name', 'need', 'want', 'price', 'ratio' ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
