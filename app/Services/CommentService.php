<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use App\Repositories\CommentsPostRepository;

/**
 * Class CommentService
 * @package App\Services
 */
class CommentService
{
    protected $commentRepository,$commentsPostRepository;
    public function __construct(CommentRepository $commentRepository,CommentsPostRepository $commentsPostRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->commentsPostRepository = $commentsPostRepository;
    }

    public function store($data){
        $validated = $data->validated();
        $commentData = $data->only(['user_name','title','text']);
        $commentsPostData = $data->except(['user_name','title','text']);

        $comment = $this->commentRepository->store($commentData);
        $commentsPost = $this->commentsPostRepository->findByPostId($validated['post_id']);
        if(!isset($validated['comment_id'])){
            $commentsPostData['comment_id'] = $comment->id;
            return $this->commentsPostRepository->store($commentsPostData);
        }
        if(!isset($validated['child1_comment_id']))
            return $this->commentsPostRepository->childUpdate($data,['child1_comment_id' => $comment->id]);
        if(!isset($validated['child2_comment_id']))
            return $this->commentsPostRepository->childUpdate($data,['child2_comment_id' => $comment->id]);
        if(!isset($validated['child3_comment_id']))
            return $this->commentsPostRepository->childUpdate($data,['child3_comment_id' => $comment->id]);
        else 
            return false;
    }
}
