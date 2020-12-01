<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\Users\UsersServiceInterface;
use App\News;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
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
     * Show users list
     * 
     * @return Illuminate\Http\Respond;
     */
    public function index()
    {
        $data = $this->usersService->getUsersList();
        return view('users.users', ['news' => $data]);
    }

    /**
     * delete user
     * 
     * @param [type] id
     */
    public function delete($id)
    {
        $this->usersService->delete($id);
        return back();
    }

    /**
     * show create user page
     */
    public function showCreate()
    {
        return view('users.userscreate');
    }

    /**
     * create user
     */
    public function create()
    {
        $this->usersService->create();
        return redirect('users')->withInput();
    }

    /**
     * confirm create user
     */
    public function confirmation(Request $request)
    {
        $validator = $this->validateUsers($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if ($request->profile) {
            $file_name = $request->file('profile')->getClientOriginalName();
            $path = $request->file('profile')->storeAs('images', $file_name, 'public');
        }
        $userConfirm = new User();
        $userConfirm->name = $request->name;
        $userConfirm->email = $request->email;
        $userConfirm->password = Hash::make($request->password);
        $userConfirm->type = $request->type;
        $userConfirm->phone = $request->phone;
        $userConfirm->dob = $request->dob;
        $userConfirm->address = $request->address;
        $userConfirm->profile = '/storage/' . $path;

        Session::put('name', $userConfirm->name);
        Session::put('email', $userConfirm->email);
        Session::put('password', $userConfirm->password);
        Session::put('type', $userConfirm->type);
        Session::put('phone', $userConfirm->phone);
        Session::put('dob', $userConfirm->dob);
        Session::put('address', $userConfirm->address);
        Session::put('profile', $userConfirm->profile);
        $request->flash();
        return view('news.newscreateconfirm', compact('userConfirm'));
    }

    /**
     * validate create user
     * 
     * @param Request $request
     */
    public function validateUsers(Request $request)
    {
        $rule = [
            'name' => 'required',
            'email' => 'required|email|unique:news,email',
            'password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
            'confirmpassword' => 'required|same:password',
            'type' => 'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ];
        return Validator::make($request->all(), $rule);
    }

    /**
     * search users
     */
    public function search()
    {
        $search = $this->usersService->search();
        return view('users.users', ['news' => $search]);
    }

    /**
     * show login user profile
     */
    public function showProfile($id)
    {
        $user = $this->usersService->showProfile($id);
        return view('users.usersprofile', ['users' => $user]);
    }

    /**
     * show update user page
     */
    public function edit($id)
    {
        $user = $this->usersService->edit($id);
        return view('users.usersedit', compact('user'));
    }

    /**
     * update post
     * 
     * @param [type] id
     */
    public function update($id)
    {
        $this->usersService->update($id);
        return redirect('users');
    }

    /**
     * show confirm update user page
     */
    public function updateConfirm(Request $request, $id)
    {
        $validator = $this->validateUpdate($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $userConfirm = $this->usersService->updateConfirm($request, $id);
        return view('users.userseditconfirm', compact('userConfirm'));
    }

    /**
     * validate update user
     */
    public function validateUpdate(Request $request)
    {
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ];
        return Validator::make($request->all(), $rule);
    }
}
