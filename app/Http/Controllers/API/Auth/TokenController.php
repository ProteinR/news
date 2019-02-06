<?php

namespace App\Http\Controllers\API\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(User::where('email', $request->get('email'))->exists()){
            $user = User::where('email', $request->get('email'))->first();
            $auth = Hash::check($request->get('password'), $user->password);
            if($user && $auth){

                $user->generateApiKey(); //Model Function

                return response(array(
                    'currentUser' => $user,
                    'message' => 'Authorization Successful!',
                ));
            }
        }

        return response(['message' => 'Unauthorized. Please, check your credentials.'], 401);
    }
}
