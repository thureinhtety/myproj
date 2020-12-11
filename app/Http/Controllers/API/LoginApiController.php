<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (User::auth()->attemp($data)) {
            $token = User::auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
    public function loginCheck(Request $request)
    {
        $data = new User();
        $data->email = request()->email;
        $data->password = Hash::make($request->password);
        $login = User::where('email', $data->email)
                ->orwhere('password', $data->password);
        // if ($login)
        //     return redirect('home');
        // else
        //     return back();
    }
}
