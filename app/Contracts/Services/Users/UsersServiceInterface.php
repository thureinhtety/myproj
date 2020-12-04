<?php

namespace App\Contracts\Services\Users;

interface UsersServiceInterface
{
    //Get users list
    public function getUsersList();

    //Delete user
    public function delete($id);

    //Search user
    public function search();

    //Create user
    public function create();

    //Show login user profile
    public function showProfile($id);

    //show update user page
    public function edit($id);

    //Update user
    public function update($id);
    
    //Show create user confirm
    public function updateConfirm($request,$id);

    //Change password
    public function changePass($request);
}