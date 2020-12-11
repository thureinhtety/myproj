<?php

namespace App\Dao\Users;

use App\Contracts\Dao\Users\UsersApiDaoInterface;
use App\News;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersApiDao implements UsersApiDaoInterface
{
    /**
     * show user list
     * 
     * @return userList
     */
    public function userList()
    {
        return User::with('user')->get();
    }

    /**
     * create user
     */
    public function create($request)
    {
        if ($request->profile) {
            $file_name = $request->file('profile')->getClientOriginalName();
            $path = $request->file('profile')->storeAs('images', $file_name, 'public');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if (($request->type) == 'Admin')
            $user->type = 0;
        elseif (($request->type) == 'User')
            $user->type = 1;

        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->profile = '/storage/' . $path;
        $user->save();
        return $user;
    }

    /**
     * update user
     */
    public function update($request, $id)
    {
        $userConfirm = User::find($id);
        if ($request->profile) {
            $file_name = $request->file('profile')->getClientOriginalName();
            $path = $request->file('profile')->storeAs('images', $file_name, 'public');
        }
        $userConfirm->name = $request->name;
        $userConfirm->email = $request->email;
        $userConfirm->type = $request->type;
        $userConfirm->phone = $request->phone;
        $userConfirm->dob = $request->dob;
        $userConfirm->address = $request->address;
        $userConfirm->profile = '/storage/' . $path;
        $userConfirm->save();
        return $userConfirm;
    }

    /**
     * delete user
     */
    public function delete($id)
    {
        $user = User::find($id)->delete();
        return $user;
    }
}
