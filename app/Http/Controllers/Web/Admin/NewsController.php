<?php

namespace App\Http\Controllers\Web\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\News;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public $news;

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
        $news = News::with(['category', 'tags', 'comments', 'user'])->get();

        return view('admin.pages.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.pages.news.create', compact(['tags', 'categories']));
    }


    public function store(StoreNewsRequest $request)
    {
        DB::transaction(function () use ($request) {
            $user = $request->user();
            $this->news = $user->news()->create($request->all());
            $this->news->tags()->sync($request->get('tags', []));
            $this->news->uploadImage($request->file('image'));
        });

        return redirect()->route('news.index');
    }

    public function edit(News $news)
    {
        $post = $news;
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.pages.news.edit', compact(['post','categories', 'tags']));
    }


    public function update(News $news, UpdateNewsRequest $request)
    {
        DB::transaction(function () use ($request, $news) {
            $news->removeImage();
            $news->fill($request->all());
            $news->save();
            $news->tags()->sync($request->get('tags', []));
            $news->uploadImage($request->file('image'));
        });

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->back();
    }
}
