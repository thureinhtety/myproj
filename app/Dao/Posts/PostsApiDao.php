<?php

namespace App\Dao\Posts;

use App\Contracts\Dao\Posts\PostsApiDaoInterface;
use App\Posts;

class PostsApiDao implements PostsApiDaoInterface
{
    public function postList()
    {
        return Posts::with('user')->get();
    }
}
