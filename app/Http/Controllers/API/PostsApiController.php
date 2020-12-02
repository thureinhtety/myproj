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

    public function index()
    {
        return $this->postsApiService->postList();
    }
}
