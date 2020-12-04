<?php

namespace App\Contracts\Services\Posts;

interface PostsServiceInterface
{
    //get posts list
    public function getPostsList();

    //delete post
    public function delete($id);

    //creat post
    public function create();

    //show post to update
    public function edit($id);

    //update post
    public function update($id);

    //confirm update post
    public function updateConfirm($request,$id);

    //search post
    public function search();

    //import file
    public function import($request);

    //export file
    public function export();
}