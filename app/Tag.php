<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title'];

    public function news() {
        return $this->belongsToMany(
          News::class,
            'news_tags',
            'tag_id',
            'news_id'
        );
    }

    public function getAllTags() {
        $response = [];

        $tags = Tag::all();
        foreach ($tags as $tag) {
            $response[] = [
                'id' => $tag->id,
                'title' => $tag->title,
            ];
        }

        return $response;
    }
}
