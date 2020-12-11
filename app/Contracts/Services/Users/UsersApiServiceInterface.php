<?php

namespace App\Contracts\Services\Users;

interface UsersApiServiceInterface
{
    //show user list
    public function userList();

    //create user
    public function create($request);

    //update user
    public function update($request,$id);

    //delete user
    public function delete($id);
}