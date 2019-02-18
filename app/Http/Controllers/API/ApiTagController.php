<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Tag;
use App\Http\Controllers\Controller;
use App\Transformer\TagsTransformer;

class ApiTagController extends Controller
{
    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return fractal($tags, new TagsTransformer())->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTagRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        $this->tag = $this->tag->create($request->all());

        return response($this->tag, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag $tag
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return response($tag, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTagRequest $request
     * @param  \App\Tag        $tag
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->fill($request->all());
        $tag->save();

        return response($tag, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag $tag
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response(null, 204);
    }
}
