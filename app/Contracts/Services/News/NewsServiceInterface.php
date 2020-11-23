<?php

namespace App\Contracts\Services\News;

interface NewsServiceInterface
{
    public function getNewsList();
    public function delete($id);
}