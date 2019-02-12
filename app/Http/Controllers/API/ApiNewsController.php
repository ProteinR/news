<?php

namespace App\Http\Controllers\API;

use App\News;
use App\Transformer\NewsTranformer;
use App\Transformer\NewsTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ApiNewsController extends Controller
{
    protected $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return all news
//        $posts = News::all();
        $posts = News::with(['user:id,name'], ['category:id, title'])->get();

        return fractal($posts, new NewsTransformer());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'category_id' => 'required',
            'user_id'     => 'required',
            'title'       => 'required',
            'text'        => 'required',
        ]);

        DB::transaction(function (Request $request, News $news) {
            $this->news = $this->news->create($request->all());
            $this->news->tags()->sync($request->get('tags', []));

        });

        return response($this->news, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News $news
     *
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $news->load(['comments.user']);

        return fractal($news, new NewsTransformer())
            ->parseIncludes('comments')
            ->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\News                $news
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        request()->validate([
            'category_id' => 'required',
            'user_id'     => 'required',
            'title'       => 'required',
            'text'        => 'required',
        ]);

        DB::transaction(function (Request $request, News $news) {
            $news->fill($request->all());
            $news->save();
            $news->tags()->sync($request->get('tags', []));
        });

        return response($news, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News $news
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return response(['News was deleted']);
    }
}
