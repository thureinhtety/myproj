<?php

namespace App\Services\Users;

use App\Contracts\Dao\Users\UsersDaoInterface;
use App\Contracts\Services\Users\UsersServiceInterface;
use Illuminate\Support\Facades\Session;

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

  /**
   * Create user
   */
  public function create()
  {
    return $this->usersDao->create();
  }

  /**
   * Show login user profile
   */
  public function showProfile($id)
  {
    return $this->usersDao->showProfile($id);
  }

  /**
   * Show update page
   */
  public function edit($id)
  {
    return $this->usersDao->edit($id);
  }

  /**
   * Update user
   */
  public function update($id)
  {
    return $this->usersDao->update($id);
  }

  /**
   * Show create user confirm
   */
  public function updateConfirm($request, $id)
  {
    $userConfirm = $this->usersDao->updateConfirm($request, $id);
    if ($request->profile) {
      $file_name = $request->file('profile')->getClientOriginalName();
      $path = $request->file('profile')->storeAs('images', $file_name, 'public');
    }
    $userConfirm->name = $request->name;
    $userConfirm->email = $request->email;
    $userConfirm->type = $request->type;
    $userConfirm->phone = $request->phone;
    $userConfirm->dob = $request->dob;
    $userConfirm->address = $request->address;
    $userConfirm->profile = '/storage/' . $path;

    Session::put('name', $userConfirm->name);
    Session::put('email', $userConfirm->email);
    Session::put('type', $userConfirm->type);
    Session::put('phone', $userConfirm->phone);
    Session::put('dob', $userConfirm->dob);
    Session::put('address', $userConfirm->address);
    Session::put('profile', $userConfirm->profile);
    return $userConfirm;
  }

  /**
   * Change password
   */
  public function changePass($request)
  {
    return $this->usersDao->changePass($request);
  }
}
