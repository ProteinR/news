<?php

namespace App\Http\Controllers\API;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiTagController extends Controller
{
    protected $tag;

    public function __construct(Tag $tag) {
        $this->tag = $tag;
        $this->middleware('auth:api')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return all tags
        $response = $this->tag->getAllTags();

        return response($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('d');
        request()->validate([
            'category_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'text' => 'required',
        ]);

        $this->tag->create($request->all());
        $this->tag->save();

        return response($this->tag, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return response($tag, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        request()->validate([
            'title' => 'required',
        ]);

        $tag->fill($request->all());
        $tag->save();

        return response($tag, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response(['Tag was deleted']);
    }
}
