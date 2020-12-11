<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Contracts\Services\Users\UsersApiServiceInterface;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;

class UserApiController extends Controller
{
    /**
     * Constructor
     */
    public function __construct(UsersApiServiceInterface $usersApiService)
    {
        $this->usersApiService = $usersApiService;
    }

    /**
     * show user list
     * 
     * @return userlist
     */
    public function index()
    {
        return $this->usersApiService->userList();
    }

    /**
     * create new user
     * 
     * @param Request $request
     */
    public function create(UserCreateRequest $request)
    {
        return $this->usersApiService->create($request);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        return $this->usersApiService->update($request, $id);
    }

    public function profile($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function delete($id)
    {
        return $this->usersApiService->delete($id);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {
            $token = Auth::user()->createToken(Auth::user()->name)->accessToken;
            $email = $request->email;
            return response()->json(['token' => $token, 'user' => Auth::user()], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['logout' => true]);
    }
}
