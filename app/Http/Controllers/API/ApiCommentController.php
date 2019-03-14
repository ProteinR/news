<?php

namespace App\Http\Controllers\API;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\DestroyCommentRequest;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\News;
use App\Transformer\CommentsTransformer;

class ApiCommentController extends Controller
{
    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function getComments(News $news)
    {
//        $comments = $news->comments()->simplePaginate(2);
        $comments = $news->comments;

        return fractal($comments, new CommentsTransformer())
            ->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCommentRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $user = $request->user();
        $comment = $user->comments()->create($request->all());

        return fractal($comment, new CommentsTransformer())
            ->toArray();
    }

    public function incrementLike(Comment $comment)
    {
        $comment->increment('likes');

        return fractal($comment, new CommentsTransformer())
            ->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCommentRequest $request
     * @param  \App\Comment        $comment
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->fill($request->all());
        $comment->save();

        return fractal($comment, new CommentsTransformer())
            ->toArray();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment $comment
     *
     * @return void
     * @throws \Exception
     */
    public function destroy(DestroyCommentRequest $request, Comment $comment)
    {
//        if (request()->user->can('delete comments') OR request()->user->id == $comment->user->id) {
//            return true;
//        }

        $comment->delete();

        return response(null, 204);
    }
}
