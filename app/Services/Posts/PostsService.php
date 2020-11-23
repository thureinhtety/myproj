<?php

namespace App\Services\Posts;

use App\Contracts\Dao\Posts\PostsDaoInterface;
use App\Contracts\Services\Posts\PostsServiceInterface;

class PostsService implements PostsServiceInterface
{
  private $postsDao;

  public function __construct(PostsDaoInterface $postsDao)
  {
    $this->postsDao = $postsDao;
  }

  public function getPostsList()
  {
    return $this->postsDao->getPostsList();
  }
  public function delete($id){
    return $this->postsDao->delete($id);
  }
  public function create(){
      return $this->postsDao->create();
  }
  public function createConfirm($request){
      return $this->postsDao->createConfirm($request);
  }
  public function edit($id){
      return $this->postsDao->edit($id);
  }
  public function update($id){
      return $this->postsDao->update($id);
  }
  public function updateConfirm($request,$id){
      return $this->postsDao->updateConfirm($request,$id);
  }
  public function search(){
      return $this->postsDao->search();
  }
  public function import($request){
      return $this->postsDao->import($request);
  }
  public function export(){
      return $this->postsDao->export();
  }
}