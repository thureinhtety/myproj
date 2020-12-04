<?php

namespace App\Dao\Posts;

use App\Contracts\Dao\Posts\PostsApiDaoInterface;
use App\Posts;

class PostsApiDao implements PostsApiDaoInterface
{
    public function postList($request)
    {
        // if($request->search)
        // {
        //     return Posts::with('user')->where('title','=',$request->search)->get();
        // }
        // else
        // {
        //     return Posts::with('user')->get();
        // }

        return Posts::with('user')->when(request('search'),function($query){
            $query->where('title','=',request('search'))->get();
        })->get();
    }
}
