<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\User\UpdateUserRequest;
use App\Transformer\UserTransformer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return fractal($users, new UserTransformer())->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return fractal($user, new UserTransformer)
            ->parseIncludes('comments')
            ->parseIncludes('news')
            ->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param  \App\User        $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->fill($request->all());
        if($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }
//        if ($request->file('avatar') != null) {
//            $user->removeImage();
//            $user->uploadImage($request->file('avatar'));
//        }
        $user->save();

        return response(['user' => fractal($user, new UserTransformer)->toArray()], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response(null, 204);
    }
}
