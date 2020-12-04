<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = ["title","description","status","create_user_id","updated_user_id","deleted_user_id","created_at","updated_at","deleted_at"];
    
    public function user(){
        return $this->belongsTo(User::class,"updated_user_id");
    }
}
