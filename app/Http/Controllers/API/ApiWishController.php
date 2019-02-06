<?php

namespace App\Http\Controllers\API;

use App\Wish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiWishController extends Controller
{
    protected $wish;

    public function __construct(Wish $wish) {
        $this->wish = $wish;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->wish->all();
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
        request()->validate([
            'name' => 'required',
            'need' => 'required',
            'want' => 'required',
            'price' => 'required',
            'ratio' => 'required',
        ]);

        $this->wish->fill($request->all());
        $this->wish->save();

        return $this->wish;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function show(Wish $wish)
    {
        return $wish;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function edit(Wish $wish)
    {
        //
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

        return $wish;
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
//        return 204;
    }
}
