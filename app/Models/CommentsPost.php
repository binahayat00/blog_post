<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'comment_id',
        'child1_comment_id',
        'child2_comment_id',
        'child3_comment_id',
    ];

    public function post(){
        return $this->belongsTo(Post::class,'post_id','id');
    }
    
    public function comment(){
        return $this->belongsTo(Comment::class,'comment_id','id');
    }

    public function child1_comment(){
        return $this->belongsTo(Comment::class,'child1_comment_id','id');
    }

    public function child2_comment(){
        return $this->belongsTo(Comment::class,'child2_comment_id','id');
    }

    public function child3_comment(){
        return $this->belongsTo(Comment::class,'child3_comment_id','id');
    }
}
