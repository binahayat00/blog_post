<?php

namespace App\Repositories;

use App\Models\Post;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class PostRepository.
 */
class PostRepository
{
    public function findById($id){
        return Post::find($id);
    }
}
