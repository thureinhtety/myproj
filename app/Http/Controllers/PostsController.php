<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $data = Posts::paginate(3);
        return view('home', [
            'posts' => $data
        ]);
    }
    public function detail($id)
    {
        $data = Posts::find($id);
        return view('home', [
            'postdetail' => $data
        ]);
    }
    public function delete($id)
    {
        $data = Posts::find($id);
        $data->delete();
        return redirect('home');
    }
    public function add()
    {
        return view('postcreate');
    }
    public function create()
    {
        $posts = new Posts();
        $posts->title = request()->title;
        $posts->description = request()->description;
        $posts->create_user_id = Auth::id();
        $posts->updated_user_id = Auth::id();
        $posts->save();
        return redirect('home');
    }
}
