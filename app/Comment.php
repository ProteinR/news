<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'news_id', 'text'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function news() {
        return $this->belongsTo(News::class, 'news_id');
    }
}
