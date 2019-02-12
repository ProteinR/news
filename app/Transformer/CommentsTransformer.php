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
    public function transform(Comment $comment)
    {
        return [
            'user_name'  => $comment->user->name,
            'text'       => $comment->text,
            'created_at' => optional($comment->created_at)->diffForHumans(),
            'updated_at' => optional($comment->updated_at)->diffForHumans(),
        ];
    }
}