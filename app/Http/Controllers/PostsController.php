<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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
        return redirect('home');
    }
    public function add()
    {
        return view('postcreate');
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
    public function createConfirm(){
        request()->validate([
            'title'=>'required',
            'description'=>['required','max:255']
        ]);
        $posts = new Posts();
        $posts->title = request()->title;
        $posts->description = request()->description;
        Session::put('title', $posts->title);
        Session::put('description', $posts->description);
        return view('postcreateconfirm',['postconfirm'=>$posts]);
    }
    public function edit($id)
    {
        $data = Posts::find($id);
        return view('postedit', ['post' => $data]);
    }
    public function update($id)
    {
        $posts = Posts::find($id);
        $posts->title = Session::get('title');
        $posts->description = Session::get('description');
        $posts->updated_user_id = auth()->id();
        $posts->save();
        return redirect('home');
    }
    public function updateConfirm($id){
        request()->validate([
            'title'=>'required',
            'description'=>['required','max:255']
        ]);
        $posts = Posts::find($id);
        $posts->title = request()->title;
        $posts->description = request()->description;
        $posts->status = request()->status;
        Session::put('title', $posts->title);
        Session::put('description', $posts->description);
        return view('posteditconfirm',['postconfirm'=>$posts]);
    }
}
