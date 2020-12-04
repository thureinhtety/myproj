<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Posts\PostsApiServiceInterface;
use App\Posts;
use Illuminate\Http\Request;

class PostsApiController extends Controller
{
    /**
     * Constructor
     */
    public function __construct(PostsApiServiceInterface $postsApiService)
    {
        $this->postsApiService = $postsApiService;
    }

    /**
     * show post list
     * 
     * @return postlist
     */
    public function index(Request $request)
    {
        return $this->postsApiService->postList($request);
    }

    /**
     * create new post
     * 
     * @param Request $request
     */
    public function create(Request $request)
    {
        $post = new Posts();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->create_user_id = $request->create_user_id;
        $post->updated_user_id = $request->updated_user_id;
        $post->save();
        return $post;
    }

    /**
     * show post detail
     * 
     * @param [Type] id
     */
    public function show($id)
    {
        $post = Posts::find($id);
        return $post;
    }

    /**
     * update post
     * 
     * @param Request $request, [Type] id
     */
    public function update(Request $request,$id)
    {
        $post = Posts::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->create_user_id = $request->create_user_id;
        $post->updated_user_id = $request->updated_user_id;
        $post->save();
        return $post;
    }

    /**
     * delete post
     * 
     * @param [Type] id
     */
    public function delete($id)
    {
        $post = Posts::find($id)->delete();
        return $post;
    }
}
