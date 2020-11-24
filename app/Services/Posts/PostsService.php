<?php

namespace App\Services\Posts;

use App\Contracts\Dao\Posts\PostsDaoInterface;
use App\Contracts\Services\Posts\PostsServiceInterface;
use Illuminate\Support\Facades\Session;
use App\Posts;

class PostsService implements PostsServiceInterface
{
  private $postsDao;

  /**
   * Constructor
   * 
   * @param PostsDaoInterface $postsDao
   */
  public function __construct(PostsDaoInterface $postsDao)
  {
    $this->postsDao = $postsDao;
  }

  /**
   * get posts list
   */
  public function getPostsList()
  {
    return $this->postsDao->getPostsList();
  }

  /**
   * delete post
   * 
   * @param [type] id
   */
  public function delete($id)
  {
    return $this->postsDao->delete($id);
  }

  /**
   * create post
   */
  public function create()
  {
    return $this->postsDao->create();
  }

  /**
   * show post to update
   */
  public function edit($id)
  {
    return $this->postsDao->edit($id);
  }

  /**
   * update post
   */
  public function update($id)
  {
    return $this->postsDao->update($id);
  }

  /**
   * confirm update post
   */
  public function updateConfirm($request, $id)
  {
    $post = $this->postsDao->updateConfirm($request, $id);
    $post->title = $request->title;
    $post->description = $request->description;
    $post->status = $request->status;
    Session::put('title', $post->title);
    Session::put('description', $post->description);
    Session::put('status', $post->status);
    return $post;
  }

  /**
   * search post
   */
  public function search()
  {
    return $this->postsDao->search();
  }

  /**
   * import post
   */
  public function import($request)
  {
    return $this->postsDao->import($request);
  }

  /**
   * export post
   */
  public function export()
  {
    return $this->postsDao->export();
  }
}
