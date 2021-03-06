<?php

namespace App\Http\Controllers\API\Auth;

use App\Transformer\UserTransformer;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                $user = User::where('email', $request->get('email'))->first();
                $user->generateApiKey(); //Model Function

                return response(array(
                    'currentUser' => $user,
                    'roles'   => $user->getRoleNames(),
//                    'currentUser' => fractal($user, new UserTransformer()),
                    'message' => 'Authorization Successful!',
                ));
            }
        }

        return response(['message' => 'Unauthorized. Please, check your credentials.'], 401);
    }
}
