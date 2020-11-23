<?php

namespace App\Contracts\Services\Posts;

interface PostsServiceInterface
{
    public function getPostsList();
    public function delete($id);
    public function create();
    public function createConfirm($request);
    public function edit($id);
    public function update($id);
    public function updateConfirm($request,$id);
    public function search();
    public function import($request);
    public function export();
}