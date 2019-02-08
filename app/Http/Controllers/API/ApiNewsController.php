<?php

namespace App\Http\Controllers\API;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiNewsController extends Controller
{
    protected $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return all news
        $response = $this->news->getAllNews();

        return response($response, 200);
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
            'category_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'text' => 'required',
        ]);

        $this->news->create($request->all());
        $this->news->save();

        return response($this->news, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return response($news, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        request()->validate([
            'category_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'text' => 'required',
        ]);

        $news->fill($request->all());
        $news->save();

        return response($news, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return response(['News was deleted']);
    }
}
