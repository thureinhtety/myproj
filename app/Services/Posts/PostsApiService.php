<?php

namespace App\Services\Posts;

use App\Contracts\Dao\Posts\PostsApiDaoInterface;
use App\Contracts\Services\Posts\PostsApiServiceInterface;
use App\Posts;

class PostsApiService implements PostsApiServiceInterface
{
  private $postsApiDao;

  /**
   * Constructor
   * 
   * @param PostsApiDaoInterface $postsApiDao
   */
  public function __construct(PostsApiDaoInterface $postsApiDao)
  {
    $this->postsApiDao = $postsApiDao;
  }

  public function postList()
  {
      return $this->postsApiDao->postList();
  }
}
