<?php

namespace App\Transformer;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'comments', 'news',
    ];

    public function transform(User $user)
    {
        return [
            'name'   => $user->name,
            'email'  => $user->email,
            'avatar' => $user->avatar,
        ];
    }

    public function includeComments(User $user)
    {
        $comments = $user->comments;

        return $this->collection($comments, new CommentsTransformer());
    }

    public function includeNews(User $user)
    {
        $news = $user->news;

        return $this->collection($news, new NewsTransformer());
    }
}