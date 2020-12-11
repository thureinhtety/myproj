<?php

namespace App\Contracts\Dao\Posts;

interface PostsApiDaoInterface
{
    //show post list
    public function postList();

    //create post
    public function create($request);

    //update post
    public function update($request,$id);
    
    //delete post
    public function delete($id);


}