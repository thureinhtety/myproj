<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Contracts\Services\Users\UsersApiServiceInterface;

class UserApiController extends Controller
{
    /**
     * Constructor
     */
    public function __construct(UsersApiServiceInterface $usersApiService)
    {
        $this->usersApiService = $usersApiService;
    }

    public function index()
    {
        return $this->usersApiService->userList();
    }
}
