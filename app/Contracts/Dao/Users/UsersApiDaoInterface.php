<?php

namespace App\Contracts\Dao\Users;

interface UsersApiDaoInterface
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