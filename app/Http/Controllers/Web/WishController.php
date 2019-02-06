<?php

namespace App\Http\Controllers\Web;

use App\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    protected $wish;

    public function __construct(Wish $wish)
    {
        $this->wish = $wish;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishes = $this->wish->all();

        return view('pages.index', compact('wishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
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
            'name' => 'required',
            'need' => 'required',
            'want' => 'required',
            'price' => 'required',
            'ratio' => 'required',
        ]);

        $this->wish->fill($request->all());
//        dd($this->wish);

        $this->wish->save();
//        dd('store');

        return redirect()->route('wishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function show(Wish $wish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function edit(Wish $wish)
    {
        return view('pages.edit', compact('wish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wish $wish)
    {
        request()->validate([
            'name' => 'required',
            'need' => 'required',
            'want' => 'required',
            'price' => 'required',
            'ratio' => 'required',
        ]);
        $wish->fill($request->all());
        $wish->save();

        return redirect()->route('wishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wish $wish)
    {
        $wish->delete();
        return redirect()->route('wishes.index');
    }
}
