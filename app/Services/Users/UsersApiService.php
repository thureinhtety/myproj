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

  /**
   * show user list
   * 
   * @return userList
   */
  public function userList()
  {
    return $this->usersApiDao->userList();
  }

  /**
   * create user
   */
  public function create($request)
  {
    return $this->usersApiDao->create($request);
  }

  /**
   * update user
   */
  public function update($request, $id)
  {
    return $this->usersApiDao->update($request,$id);
  }

  /**
   * delete user
   */
  public function delete($id)
  {
    return $this->usersApiDao->delete($id);
  }
}
