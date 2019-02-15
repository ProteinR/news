<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{

    public function show(Request $request)
    {
        $response = $request->user();

        return $response;
    }

    //Register new user
    public function store(StoreUserRequest $request, User $user)
    {
        if($request->get('password')) {
            $request->merge(['password' => Hash::make($request->get('password'))]);
        }
        $user->fill($request->all())->save();

        return response(['message' => 'User created successfully', 'user' => $user], 200);
    }

    public function update(UpdateUserRequest $request)
    {
        $user = $request->user();
        if($request->get('password')) {
            $request->merge(['password' => Hash::make($request->get('password'))]);
        }
        $user->update($request->all());

        return response(['message' => 'User updated successfully', 'user' => $user], 200);
    }

    public function destroy(Request $request)
    {
        $user = $request->user();
        $user->delete();

        return response(['message' => 'User id = '.$user->id.' deleted', 'user' => $user], 200);
    }
}
