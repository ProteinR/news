<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\News;
use App\Tag;
use App\Transformer\NewsTransformer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $posts = News::with(['user:id,name', 'category:id,title'])->get();

        return fractal($posts, new NewsTransformer())->toArray();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        DB::transaction(function () use ($request) {
            $user = $request->user();
            $this->news = $user->news()->create($request->all());
            $this->news->tags()->sync($request->get('tags', []));
        });
        $post = News::find($this->news->id);

        return fractal($post, new NewsTransformer())->toArray();
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
        $news->increment('views');
        $news->load(['user:id,name', 'comments.user:id,name,avatar', 'category:id,title']);

        return fractal($news, new NewsTransformer())
            ->parseIncludes(['comments'])
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
    public function update(UpdateNewsRequest $request, News $news)
    {
        DB::transaction(function () use ($request, $news) {
//            $user = $news->user;
            $news->fill($request->all());
            $news->save();
            $news->tags()->sync($request->get('tags', []));
        });

        return fractal($news, new NewsTransformer())
            ->toArray();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News $news
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(News $news)
    {
        $news->delete();

        return response(null, 204);
    }

    public function newsWithCategory(Category $category)
    {
        $news = $category->news()->get();

        return fractal($news, new NewsTransformer())
            ->toArray();
    }

    public function newsWithTag(Tag $tag)
    {
        $news = $tag->news()->get();

        return fractal($news, new NewsTransformer())
            ->toArray();
    }

    public function newsWithUser(User $user)
    {
        $news = $user->news()->get();

        return fractal($news, new NewsTransformer())
            ->toArray();
    }

    public function topNews($count) {
        $news = News::orderBy('views', 'DESC')->take($count)->get();

        return fractal($news, new NewsTransformer())
            ->toArray();
    }
}
