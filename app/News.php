<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    protected $fillable = ['category_id', 'user_id', 'title', 'text', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'news_tags',
            'news_id',
            'tag_id'
        );
    }


    public function removeImage()
    {
        if ($this->image != null) {
            $arrayPath = explode('/', $this->image);
            $thisImageName = array_pop($arrayPath);
            Storage::delete('/public/img/'.$thisImageName);
        }
    }

    public function uploadImage($image)
    {
        if ($image == null) { //если картинка не зашла - выйти
            return;
        }

        $imageName = str_random(10).'.'.$image->extension();
        $image->storeAs('/public/img', $imageName);
        $this->image = '/storage/img/'.$imageName;
        $this->save();
    }
}
