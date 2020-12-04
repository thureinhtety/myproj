<?php

namespace App\Dao\Users;

use App\Contracts\Dao\Users\UsersDaoInterface;
use App\News;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersDao implements UsersDaoInterface
{
    /**
     * Get users list
     */
    public function getUsersList()
    {
        return User::paginate(5);
    }

    /**
     * Delete user
     * 
     * @param [type] id
     */
    public function delete($id)
    {
        return User::find($id)->delete();
    }

    /**
     * Search user
     */
    public function search()
    {
        $data = new User();
        $data->name = request()->name;
        $data->email = request()->email;
        $data->created_from = request()->created_from;
        $data->created_to = request()->created_to;
        if ($data->created_from && $data->created_to) {
            return User::where('name', $data->name)
                ->orwhere('email', $data->email)
                ->orwhereBetween('created_at', [$data->created_from, $data->created_to])
                ->paginate(5);
        } elseif ($data->created_to) {
            return User::where('name', $data->name)
                ->orwhere('email', $data->email)
                ->orwhere('created_at', '<=', $data->created_to)
                ->paginate(5);
        } elseif ($data->created_from) {
            return User::where('name', $data->name)
                ->orwhere('email', $data->email)
                ->orwhere('created_at', '>=', $data->created_from)
                ->paginate(5);
        } elseif (!$data->created_from && !$data->created_to) {
            return User::where('name', $data->name)
                ->orwhere('email', $data->email)
                ->paginate(5);
        }
    }

    /**
     * Create user
     */
    public function create()
    {
        $user = new User();
        $user->name = Session::get('name');
        $user->email = Session::get('email');
        $user->password = Session::get('password');

        if (Session::get('type') == 'Admin')
            $user->type = 0;
        elseif (Session::get('type') == 'User')
            $user->type = 1;

        $user->phone = Session::get('phone');
        $user->dob = Session::get('dob');
        $user->address = Session::get('address');
        $user->profile = Session::get('profile');
        $user->create_user_id = Auth::id();
        $user->updated_user_id = Auth::id();
        $user->save();
    }

    /**
     * Show login user profile
     */
    public function showProfile($id)
    {
        return User::find($id);
    }

    /**
     * Show update user page
     */
    public function edit($id)
    {
        return User::find($id);
    }

    /**
     * Update user
     */
    public function update($id)
    {
        $user = User::find($id);
        $user->name = Session::get('name');
        $user->email = Session::get('email');

        if (Session::get('type') == 'Admin')
            $user->type = 0;
        elseif (Session::get('type') == 'User')
            $user->type = 1;

        $user->phone = Session::get('phone');
        $user->dob = Session::get('dob');
        $user->address = Session::get('address');
        $user->profile = Session::get('profile');
        $user->create_user_id = Auth::id();
        $user->updated_user_id = Auth::id();
        $user->save();
    }

    /**
     * Show create user confirm
     */
    public function updateConfirm($request, $id)
    {
        return User::find($id);
    }

    /**
     * Change password
     */
    public function changePass($request)
    {
        return User::find(auth()->user()->id)
            ->update(['password' => Hash::make($request->new_password)]);
    }
}
