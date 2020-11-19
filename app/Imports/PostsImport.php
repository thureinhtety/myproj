<?php

namespace App\Imports;

use App\Posts;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Posts([
            "title"=>$row["title"],
            "description"=>$row["description"],
            "status"=>$row["status"],
            "create_user_id"=>$row["create_user_id"],
            "updated_user_id"=>$row["updated_user_id"],
            "deleted_user_id"=>$row["deleted_user_id"],
            "created_at"=>$row["created_at"],
            "updated_at"=>$row["updated_at"],
            "deleted_at"=>$row["deleted_at"],
        ]);
    }
}
