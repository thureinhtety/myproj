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
    public function userList()
    {
        return User::with('user')->get();
    }
}
