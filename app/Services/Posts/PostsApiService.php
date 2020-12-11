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

  /**
   * show post list
   * 
   * @return postList
   */
  public function postList()
  {
      return $this->postsApiDao->postList();
  }

  /**
   * create post
   */
  public function create($request)
  {
    return $this->postsApiDao->create($request);
  }

  /**
   * update post
   */
  public function update($request, $id)
  {
    return $this-> postsApiDao->update($request,$id);
  }

  /**
   * delete post
   */
  public function delete($id)
  {
    return $this->postsApiDao->delete($id);
  }
}
