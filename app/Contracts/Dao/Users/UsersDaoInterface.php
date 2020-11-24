<?php

namespace App\Contracts\Dao\Users;

interface UsersDaoInterface
{
    //Get users list
    public function getUsersList();

    //Delete user
    public function delete($id);

    //Search user
    public function search();
}