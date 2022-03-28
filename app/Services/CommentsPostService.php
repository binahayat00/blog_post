<?php

namespace App\Services;

use App\Repositories\CommentsPostRepository;

/**
 * Class CommentsPostService
 * @package App\Services
 */
class CommentsPostService
{
    protected $commentsPostRepository;
    public function __construct(CommentsPostRepository $commentsPostRepository)
    {
        $this->commentsPostRepository = $commentsPostRepository;
    }

    public function findByPostId($data){
        $validated = $data->validated();
        return $this->commentsPostRepository->findByPostId($validated['postId']);
    }

    public function store($data){
        $validated = $data->validated();
        return $this->commentsPostRepository->store($validated);
    }
}
