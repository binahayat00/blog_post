<?php

namespace App\Services;

use App\Repositories\PostRepository;

/**
 * Class PostService
 * @package App\Services
 */
class PostService
{
    protected $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function findById($id){
        return $this->postRepository->findById($id);
    }
}
