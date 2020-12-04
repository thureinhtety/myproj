<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\Users\UsersServiceInterface;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;

class PasswordController extends Controller
{
    /**
     * Constructor
     * 
     * @param UsersServiceInterface $usersService
     */
    public function __construct(UsersServiceInterface $usersService)
    {
        $this->middleware('auth');
        $this->usersService = $usersService;
    }

    /**
     * change password view
     *
     * @return void
     */
    public function changeView()
    {
        return view('change_password');
    }

    /**
     * change password
     *
     * @param Request $request
     * @return void
     */
    public function changePassword(Request $request)
    {
        $validator = $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_new_password' => ['required', 'same:new_password'],
        ]);
        if (!$validator) {
            return back()->withErrors($validator)->withInput();
        }

        $change = $this->usersService->changePass($request);

        if ($change) {
            Auth::logout();
            return redirect('/login');
        }
    }
}
