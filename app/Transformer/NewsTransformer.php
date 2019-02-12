<?php

namespace App\Transformer;

use App\News;
use League\Fractal\TransformerAbstract;

class NewsTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'comments',
    ];

    public function transform(News $news)
    {
        return [
            'id'         => (int)$news->id,
            'author'     => $news->user->name,
            'category'   => $news->category->title,
            'text'       => $news->text,
            'created_at' => optional($news->created_at)->format('Y-m-d H:i'),
            'updated_at' => optional($news->updated_at)->format('Y-m-d H:i'),
        ];
    }

    public function includeComments(News $post)
    {
        $comments = $post->comments;

        return $this->collection($comments, new CommentsTransformer());
    }
}