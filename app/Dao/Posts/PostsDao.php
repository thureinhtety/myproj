<?php

namespace App\Dao\Posts;

use App\Contracts\Dao\Posts\PostsDaoInterface;
use App\Posts;
use Illuminate\Support\Facades\Session;
use App\Imports\PostsImport;
use App\Exports\PostsExport;
use Excel;
use Illuminate\Support\Facades\Auth;

class PostsDao implements PostsDaoInterface
{
    /**
     * get posts list
     * 
     * @return posts list
     */
    public function getPostsList()
    {
        return Posts::paginate(5);
    }

    /**
     * delete post
     * 
     * @return void
     */
    public function delete($id)
    {
        Posts::find($id)->delete();
    }

    /**
     * create post
     * 
     * @return void
     */
    public function create()
    {
        $posts = new Posts();
        $posts->title = Session::get('title');
        $posts->description = Session::get('description');
        $posts->create_user_id = Auth::id();
        $posts->updated_user_id = Auth::id();
        $posts->save();
    }

    /**
     * show post to update
     * 
     * @param [type] id
     */
    public function edit($id)
    {
        return Posts::find($id);
    }

    /**
     * update post
     * 
     * @param [type] id
     */
    public function update($id)
    {
        $posts = Posts::find($id);
        $posts->title = Session::get('title');
        $posts->description = Session::get('description');
        if (Session::has('status'))
            $posts->status = 1;
        else
            $posts->status = 0;
        $posts->updated_user_id = Auth::id();
        $posts->save();
    }

    /**
     * confirm update post
     * 
     * @param [type] id,Request $request
     */
    public function updateConfirm($request, $id)
    {
        return Posts::find($id);
    }

    /**
     * search post
     */
    public function search()
    {
        $data = new Posts();
        $data->post = request()->post;
        return Posts::where("title", $data->post)
        ->orwhere("description", "like", "%" . $data->post . "%")
        ->paginate(3);
    }

    /**
     * import post
     */
    public function import($request)
    {
        return Excel::import(new PostsImport, $request->import_file);
    }

    /**
     * export post
     */
    public function export()
    {
        return Excel::download(new PostsExport, "posts.xlsx");
    }
}
