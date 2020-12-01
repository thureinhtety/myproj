<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function loginCheck(Request $request)
    {
        $data = new News();
        $data->email = request()->email;
        $data->password = Hash::make($request->password);
        $login = News::where('email', $data->email)
                ->orwhere('password', $data->password);
        if ($login)
            return redirect('home');
        else
            return back();
    }
}
