<?php

namespace App\Transformer;

use App\News;
use League\Fractal\TransformerAbstract;

class NewsTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'comments', 'tags',
    ];

    public function transform(News $news)
    {
        return [
            'id'         => (int)$news->id,
            'user'     => [
                'id'   => (int)$news->user->id,
                'name' => $news->user->name,
            ],
            'category'   => [
                    'id'    => $news->category->id,
                    'title' => $news->category->title,
            ],
            'title'      => $news->title,
            'text'       => $news->text,
            'created_at' => optional($news->created_at)->format('d/m/Y'),
            'updated_at' => optional($news->updated_at)->format('d/m/Y'),
        ];
    }

    public function includeComments(News $post)
    {
        $comments = $post->comments;

        return $this->collection($comments, new CommentsTransformer());
    }

    public function includeTags(News $post)
    {
        $tags = $post->tags;

        return $this->collection($tags, new TagsTransformer());
    }
}