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

use function GuzzleHttp\Promise\all;

class PostsController extends Controller
{
    public function index()
    {
        $data = Posts::paginate(5);
        return view('home', [
            'posts' => $data
        ]);
    }

    public function delete($id)
    {
        $data = Posts::find($id);
        $data->delete();
        return back();
    }
    public function add()
    {
        return view('posts.postcreate');
    }
    public function create()
    {
        $posts = new Posts();
        $posts->title = Session::get('title');
        $posts->description = Session::get('description');
        $posts->create_user_id = auth()->id();
        $posts->updated_user_id = auth()->id();
        $posts->save();
        return redirect('home');
    }
    public function createConfirm()
    {
        request()->validate([
            'title' => 'required|unique:posts,title',
            'description' => 'required|max:255'
        ]);
        $posts = new Posts();
        $posts->title = request()->title;
        $posts->description = request()->description;
        Session::put('title', $posts->title);
        Session::put('description', $posts->description);
        return view('posts.postcreateconfirm', ['postconfirm' => $posts]);
    }
    public function edit($id)
    {
        $data = Posts::find($id);
        return view('posts.postedit', ['post' => $data]);
    }
    public function update($id)
    {
        $posts = Posts::find($id);
        $posts->title = Session::get('title');
        $posts->description = Session::get('description');
        $posts->status = Session::get('status');
        $posts->updated_user_id = auth()->id();
        $posts->save();
        return redirect('home');
    }
    public function updateConfirm($id)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required|max:255'
        ]);
        $posts = Posts::find($id);
        $posts->title = request()->title;
        $posts->description = request()->description;
        $posts->status = request()->status;
        Session::put('title', $posts->title);
        Session::put('description', $posts->description);
        Session::put('status', $posts->status);
        return view('posts.posteditconfirm', ['postconfirm' => $posts]);
    }
    public function search()
    {
        $data = new Posts();
        $data->post = request()->post;
        //  $name=User::where("name",$data->post)->get('id');
        //  $posts=User::find($name);
        $search = Posts::where("title", $data->post)->orwhere("description", "like", "%" . $data->post . "%")->paginate(3);
        return view('home', ['posts' => $search]);
    }


    public function upload()
    {
        return view('fileupload');
    }
    public function import(Request $request)
    {
        request()->validate([
            'import_file' => 'required|file|mimes:xlsx'
        ]);
        Excel::import(new PostsImport,$request->import_file);
        return redirect('home');
    }
    public function export(){
        return Excel::download(new PostsExport,"posts.csv");
    }
}
