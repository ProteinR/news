<?php

namespace App\Http\Controllers\API;

use App\Comment;
use Illuminate\Http\Request;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'text' => 'required',
            'news_id' => 'required',
            'user_id' => 'required',
        ]);
        $this->comment = $this->comment->create($request->all());

        return response($this->comment, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        request()->validate([
            'text' => 'required',
        ]);

        $comment->fill($request->all());
        $comment->save();

        return response($comment, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
    }
}
