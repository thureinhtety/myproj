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
}