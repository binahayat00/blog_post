<?php

namespace App\Repositories;

use App\Models\Comment;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class CommentRepository.
 */
class CommentRepository
{
    public function store($data){
        return Comment::create($data);
    }
}
