<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];

    public function news() {
        return $this->hasMany(News::class);
    }

    public function getAllCategories() {
        $response = [];

        $categories = Category::all();
        foreach ($categories as $category) {
            $response[] = [
                'id' => $category->id,
                'title' => $category->title,
                'order' => $category->order
            ];
        }

        return $response;
    }
}
