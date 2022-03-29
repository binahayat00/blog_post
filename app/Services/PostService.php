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

    public function findById($data){
        $validated = $data->validated();
        return $this->postRepository->findById($validated['id']);
    }
}
