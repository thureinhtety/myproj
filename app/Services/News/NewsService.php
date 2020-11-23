<?php

namespace App\Services\News;

use App\Contracts\Dao\News\NewsDaoInterface;
use App\Contracts\Services\News\NewsServiceInterface;

class NewsService implements NewsServiceInterface
{
  private $newsDao;

  public function __construct(NewsDaoInterface $newsDao)
  {
    $this->newsDao = $newsDao;
  }
  public function getNewsList()
  {
    return $this->newsDao->getNewsList();
  }
  public function delete($id)
  {
    return $this->newsDao->delete($id);
  }
}