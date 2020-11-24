<?php

namespace App\Services\Users;

use App\Contracts\Dao\Users\UsersDaoInterface;
use App\Contracts\Services\Users\UsersServiceInterface;

class UsersService implements UsersServiceInterface
{
  private $usersDao;

  /**
   * Constructor
   * 
   * @param UsersDaoInterface $usersDao
   */
  public function __construct(UsersDaoInterface $usersDao)
  {
    $this->usersDao = $usersDao;
  }

  /**
   * Get users list
   */
  public function getUsersList()
  {
    return $this->usersDao->getUsersList();
  }

  /**
   * Delete user
   * 
   * @param [type] id
   */
  public function delete($id)
  {
    return $this->usersDao->delete($id);
  }

  /**
   * Search user
   */
  public function search()
  {
    return $this->usersDao->search();
  }
}
