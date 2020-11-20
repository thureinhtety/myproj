<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $data = News::paginate(5);
        return view('news.news', [
            'news' => $data
        ]);
    }
    public function delete($id){
        $data = News::find($id);
        $data->delete();
        return back();
    }
    public function add(){
        return view('news.newscreate');
    }
    public function createConfirm(){
        return view('news.newscreateconfirm');
    }
}
