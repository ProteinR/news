<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['category_id','user_id', 'title', 'text'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function tags(){
        return $this->belongsToMany(
            Tag::class,
            'news_tags',
            'news_id',
            'tag_id'
        );
    }

    // Return array with all news
    public function getAllNews() {
        $news = News::all();

        $response = [];

        foreach ($news as $post) {
            $response[] = [
                'user'       => $post->user->name,
                'category'   => $post->category->title,
                'text'       => $post->text,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
            ];
        }

        return $response;
    }

}
