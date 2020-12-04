<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\Posts\PostsServiceInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Posts;

class PostsController extends Controller
{
    /**
     * Constructor
     */
    public function __construct(PostsServiceInterface $postsService)
    {
        $this->postsService = $postsService;
    }

    /**
     * Show post lists
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->postsService->getPostsList();
        return view('home', ['posts' => $data]);
    }

    /**
     * delete post
     * 
     * @param [type] id
     */
    public function delete($id)
    {
        $this->postsService->delete($id);
        return redirect('home');
    }

    /**
     * show create post page
     * 
     * @return void
     */
    public function showCreate()
    {
        return view('posts.postcreate');
    }

    /**
     * create post
     * 
     * @return void
     */
    public function create()
    {
        $this->postsService->create();
        return redirect('home')->withInput();
    }

    /**
     * show confirm create post page
     * 
     * @param Request $request
     */
    public function createConfirm(Request $request)
    {
        $validator = $this->validatePosts($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $postconfirm = new Posts();
        $postconfirm->title = $request->title;
        $postconfirm->description = $request->description;
        Session::put('title', $postconfirm->title);
        Session::put('description', $postconfirm->description);
        $request->flash();
        return view('posts.postcreateconfirm', compact('postconfirm'));
    }

    /**
     * validate create post
     * 
     * @param Request $request
     */
    public function validatePosts(Request $request)
    {
        $rule = [
            'title' => 'required|unique:posts,title',
            'description' => 'required|max:255'
        ];
        return Validator::make($request->all(), $rule);
    }

    /**
     * show update post page
     * 
     * @param [type] id
     */
    public function edit($id)
    {
        $data = $this->postsService->edit($id);
        return view('posts.postedit', ['post' => $data]);
    }

    /**
     * update post
     * 
     * @param [type] id
     * @return void
     */
    public function update($id)
    {
        $this->postsService->update($id);
        return redirect('home');
    }

    /**
     * show confirm update post page
     * 
     * @param Request $request, [type] id
     */
    public function updateConfirm(Request $request, $id)
    {
        $validator = $this->validateUpdate($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $postconfirm = $this->postsService->updateConfirm($request, $id);
        return view('posts.posteditconfirm', compact('postconfirm'));
    }

    /**
     * validate update post
     */
    public function validateUpdate(Request $request)
    {
        $rule = [
            'title' => 'required',
            'description' => 'required|max:255'
        ];
        return Validator::make($request->all(), $rule);
    }

    /**
     * search post
     */
    public function search()
    {
        $search = $this->postsService->search();
        return view('home', ['posts' => $search]);
    }

    /**
     * show import page
     * 
     * @return void
     */
    public function upload()
    {
        return view('fileupload');
    }

    /**
     * import file
     * 
     * @param Request $request
     */
    public function import(Request $request)
    {
        $validator = $this->validateImport($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->postsService->import($request);
        return redirect('home');
    }

    /**
     * validate import file
     */
    public function validateImport(Request $request)
    {
        $rules = [
            'import_file' => 'required|file|mimes:xlsx'
        ];
        return Validator::make($request->all(), $rules);
    }

    /**
     * export file
     * 
     * @return void
     */
    public function export()
    {
        return  $this->postsService->export();
    }
}
