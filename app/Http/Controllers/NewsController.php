<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Contracts\Services\News\NewsServiceInterface;

class NewsController extends Controller
{
    public function __construct(NewsServiceInterface $newsService)
    {
        $this->newsService = $newsService;
    }
    public function index()
    {
        $data = $this->newsService->getNewsList();
        return view('news.news', ['news' => $data]);
    }

    public function delete($id)
    {
        $this->newsService->delete($id);
        return back();
    }
    
    public function add()
    {
        return view('news.newscreate');
    }
    public function createConfirm()
    {
        return view('news.newscreateconfirm');
    }
}
