<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 12.02.19
 * Time: 9:11
 */

namespace App\Transformer;


use App\Comment;
use App\News;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class CommentsTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'news'
    ];

    public function transform(Comment $comment)
    {
        return [
            'user'  => [
                'id'     => $comment->user->id,
                'name'   => $comment->user->name,
                'avatar' => $comment->user->avatar,
            ],
            'news' => $comment->news,
            'id' => $comment->id,
            'text'       => $comment->text,
            'likes'       => $comment->likes,
            'created_at' => optional($comment->created_at)->diffForHumans(),
            'updated_at' => optional($comment->updated_at)->diffForHumans(),
        ];
    }

    public function includeNews(Comment $comment)
    {
        $news = $comment->news;

        return $this->item($news, new NewsTransformer());
    }
}