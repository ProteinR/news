<?php

namespace App\Http\Controllers\API;

use App\Comment;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Http\Controllers\Controller;

class ApiCommentController extends Controller
{
    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
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
//        $this->comment = $this->comment->create($request->all());

        return response($comment);
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

        return response($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment $comment
     *
     * @return void
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response(null, 204);
    }
}
