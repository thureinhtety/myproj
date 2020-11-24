<?php

namespace App\Dao\Users;

use App\Contracts\Dao\Users\UsersDaoInterface;
use App\News;

class UsersDao implements UsersDaoInterface
{
    /**
     * Get users list
     */
    public function getUsersList()
    {
        return News::paginate(5);
    }

    /**
     * Delete user
     * 
     * @param [type] id
     */
    public function delete($id)
    {
        return News::find($id)->delete();
    }

    /**
     * Search user
     */
    public function search()
    {
        $data=new News();
        $data->name=request()->name;
        $data->email=request()->email;
        $data->created_from=request()->created_from;
        $data->created_to=request()->created_to;
        return News::where('name', $data->name)
        ->orwhere('email',$data->email)
        ->orwhereBetween('created_at',[$data->created_from,$data->created_to]) 
        ->paginate(5);
    }
}