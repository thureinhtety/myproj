<?php

namespace App\Dao\News;

use App\Contracts\Dao\News\NewsDaoInterface;
use App\News;

class NewsDao implements NewsDaoInterface
{
    public function getNewsList()
    {
        return News::paginate(5);
    }
    public function delete($id)
    {
        return News::find($id)->delete();
    }
}