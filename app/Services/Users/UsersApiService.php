<?php

namespace App\Services\Users;

use App\Contracts\Dao\Users\UsersApiDaoInterface;
use App\Contracts\Services\Users\UsersApiServiceInterface;

class UsersApiService implements UsersApiServiceInterface
{
  private $usersDao;

  /**
   * Constructor
   * 
   * @param UsersApiDaoInterface $usersApiDao
   */
  public function __construct(UsersApiDaoInterface $usersApiDao)
  {
    $this->usersApiDao = $usersApiDao;
  }
  public function userList()
  {
        return $this->usersApiDao->userList();
  }
}
