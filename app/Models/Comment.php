<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_name',
        'title',
        'text'
    ];
    
    public function commentPost(){
        return $this->hasMany(CommentsPost::class,'comment_id','id');
    }

    public function child1_commentPost(){
        return $this->hasMany(CommentsPost::class,'child1_comment_id','id');
    }
    
    public function child2_commentPost(){
        return $this->hasMany(CommentsPost::class,'child2_comment_id','id');
    }

    public function child3_commentPost(){
        return $this->hasMany(CommentsPost::class,'child3_comment_id','id');
    }
}
