<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsPost extends Model
{
    use HasFactory;

    public function comment(){
        return $this->belongsTo(Comment::class,'comment_id','id');
    }

    public function child1_comment(){
        return $this->belongsTo(Comment::class,'child1_comment_id','id');
    }

    public function child2_comment(){
        return $this->belongsTo(Comment::class,'child2_comment_id','id');
    }
}
