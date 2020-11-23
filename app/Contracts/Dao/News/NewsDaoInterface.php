<?php

namespace App\Contracts\Dao\News;

interface NewsDaoInterface
{
    public function getNewsList();
    public function delete($id);
}