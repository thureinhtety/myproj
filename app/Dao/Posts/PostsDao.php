<?php

namespace App\Dao\Posts;

use App\Contracts\Dao\Posts\PostsDaoInterface;
use App\Posts;
use Illuminate\Support\Facades\Session;
use App\Imports\PostsImport;
use App\Exports\PostsExport;
use Excel;

class PostsDao implements PostsDaoInterface
{
    public function getPostsList()
    {
        return Posts::paginate(5);
    }
    public function delete($id){
        Posts::find($id)->delete();
    }
    public function create(){
        $posts = new Posts();
        $posts->title = Session::get('title');
        $posts->description = Session::get('description');
        $posts->create_user_id = auth()->id();
        $posts->updated_user_id = auth()->id();
        $posts->save();
    }
    public function createConfirm($request){
        $posts = new Posts();
        $posts->title = $request->title;
        $posts->description = $request->description;
        Session::put('title', $posts->title);
        Session::put('description', $posts->description);
        return $posts;
    }
    public function edit($id){
        return Posts::find($id);
    }
    public function update($id){
        $posts = Posts::find($id);
        $posts->title = Session::get('title');
        $posts->description = Session::get('description');
        $posts->status = Session::get('status');
        $posts->updated_user_id = auth()->id();
        $posts->save();
    }
    public function updateConfirm($request,$id){
        $posts = Posts::find($id);
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->status = $request->status;
        Session::put('title', $posts->title);
        Session::put('description', $posts->description);
        Session::put('status', $posts->status);
        return $posts;
    }
    public function search()
    {
        $data = new Posts();
        $data->post = request()->post;
        return Posts::where("title", $data->post)->orwhere("description", "like", "%" . $data->post . "%")->paginate(3);
    }
    public function import($request)
    {
        return Excel::import(new PostsImport, $request->import_file);
    }
    public function export()
    {
        return Excel::download(new PostsExport, "posts.xlsx");
    }
}
