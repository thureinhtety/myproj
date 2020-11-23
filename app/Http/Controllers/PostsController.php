<?php

namespace App\Http\Controllers;

use App\Exports\PostsExport;
use Illuminate\Support\Facades\Auth;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Imports\PostsImport;
use Excel;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;
use App\User;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use App\Contracts\Services\Posts\PostsServiceInterface;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class PostsController extends Controller
{
    public function __construct(PostsServiceInterface $postsService)
    {
        $this->postsService = $postsService;
    }
    public function index()
    {
        $data = $this->postsService->getPostsList();

        return view('home', ['posts' => $data,]);
    }

    public function delete($id)
    {
        $this->postsService->delete($id);
        return redirect('home');
    }

    public function add()
    {
        return view('posts.postcreate');
    }
    public function create()
    {
        $this->postsService->create();
        return redirect('home');
    }
    public function createConfirm(Request $request)
    {
        $validator = $this->validatePosts($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $postconfirm = $this->postsService->createConfirm($request);
        return view('posts.postcreateconfirm', compact('postconfirm'));
    }
    public function validatePosts(Request $request)
    {
        $rule = [
            'title' => 'required|unique:posts,title',
            'description' => 'required|max:255'
        ];
        return Validator::make($request->all(), $rule);
    }

    public function edit($id)
    {
        $data = $this->postsService->edit($id);
        return view('posts.postedit', ['post' => $data]);
    }
    public function update($id)
    {
        $this->postsService->update($id);
        return redirect('home');
    }
    public function updateConfirm(Request $request, $id)
    {
        $validator = $this->validateUpdate($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $postconfirm = $this->postsService->updateConfirm($request, $id);
        return view('posts.posteditconfirm', compact('postconfirm'));
    }
    public function validateUpdate(Request $request)
    {
        $rule = [
            'title' => 'required',
            'description' => 'required|max:255'
        ];
        return Validator::make($request->all(), $rule);
    }

    public function search()
    {
        $search = $this->postsService->search();
        return view('home', ['posts' => $search]);
    }

    public function upload()
    {
        return view('fileupload');
    }
    public function import(Request $request)
    {
        $validator = $this->validateImport($request);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $this->postsService->import($request);
        return redirect('home');
    }
    public function validateImport(Request $request)
    {
        $rules = [
            'import_file' => 'required|file|mimes:xlsx'
        ];
        return Validator::make($request->all(), $rules);
    }

    public function export()
    {
        return  $this->postsService->export();
    }
}
