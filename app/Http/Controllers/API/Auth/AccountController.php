<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Requests\Authorization\UpdateRequest;
use App\User;
use App\Http\Requests\Request;
use App\Transformers\UserTransformer;
use App\Http\Requests\Authorization\TokenRequest;
use Auth;
use Hash;


class AccountController
{
    public function show(Request $request)
    {
        $response = fractal($request->user(), new UserTransformer())->toArray();

        return $response;
    }

    public function store(Request $request, User $user)
    {
        if($request->get('password')){
            $request->merge(['password' => Hash::make($request->get('password'))]);
        }
        $user->fill($request->all())->save();
        $response = fractal($user, new User())->toArray();

        return $response;
    }

    public function update(UpdateRequest $request)
    {
        $user = $request->user();
        if($request->get('password')){
            $request->merge(['password' => Hash::make($request->get('password'))]);
        }
        $user->update($request->all());
        $response = fractal($user, new UserTransformer())->toArray();

        return $response;
    }
}
