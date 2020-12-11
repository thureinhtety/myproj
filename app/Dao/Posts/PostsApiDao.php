<?php

namespace App\Dao\Posts;

use App\Contracts\Dao\Posts\PostsApiDaoInterface;
use App\Posts;

class PostsApiDao implements PostsApiDaoInterface
{
    /**
     * show post list
     * 
     * @return postList
     */
    public function postList()
    {
        return Posts::with('user')->get();
    }

    /**
     * create post
     */
    public function create($request)
    {
        $post = Posts::create($request->only('title','description'));
        return $post;
    }

    /**
     * update post
     */
    public function update($request, $id)
    {
        $post = Posts::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->status = $request->status;
        $post->save();
        return $post;
    }

    /**
     * delete post
     */
    public function delete($id)
    {
        $post = Posts::find($id)->delete();
        return $post;
    }
}
