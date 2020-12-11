<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Posts\PostsApiServiceInterface;
use App\Posts;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;

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
    public function index()
    {
        return $this->postsApiService->postList();
    }

    /**
     * create new post
     * 
     * @param Request $request
     */
    public function create(PostCreateRequest $request)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required'
        // ]);
        // $post = new Posts();
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->create_user_id = $request->create_user_id;
        // $post->updated_user_id = $request->updated_user_id;

        return $this->postsApiService->create($request);
    }

    /**
     * update post
     * 
     * @param Request $request, [Type] id
     */
    public function update(PostUpdateRequest $request,$id)
    {
        return $this->postsApiService->update($request,$id);
    }

    /**
     * delete post
     * 
     * @param [Type] id
     */
    public function delete($id)
    {
        return $this->postsApiService->delete($id);
    }
}
