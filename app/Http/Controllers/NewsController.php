<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\Users\UsersServiceInterface;

class NewsController extends Controller
{
    /**
     * Constructor
     * 
     * @param UsersServiceInterface $usersService
     */
    public function __construct(UsersServiceInterface $usersService)
    {
        $this->usersService = $usersService;
    }

    /**
     * Show users list
     * 
     * @return Illuminate\Http\Respond;
     */
    public function index()
    {
        $data = $this->usersService->getUsersList();
        return view('news.news', ['news' => $data]);
    }

    /**
     * delete user
     * 
     * @param [type] id
     */
    public function delete($id)
    {
        $this->usersService->delete($id);
        return back();
    }

    public function showCreate()
    {
        return view('news.newscreate');
    }
    public function createConfirm()
    {
        return view('news.newscreateconfirm');
    }

    /**
     * search users
     */
    public function search()
    {
        $search = $this->usersService->search();
        return view('news.news', ['news' => $search]);
    }
}
