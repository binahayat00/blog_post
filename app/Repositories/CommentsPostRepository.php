<?php

namespace App\Repositories;

use App\Models\CommentsPost;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class CommentsPostRepository.
 */
class CommentsPostRepository
{
    public function findByPostId($postId){
        return CommentsPost::with('comment','child1_comment','child2_comment')->orderByDesc('updated_at')->get();
        //return CommentsPost::where(['post_id' => $postId])->get();
    }

    public function store($data){
        return CommentsPost::insert($data);
    }

    public function childUpdate($data, array $child){
        return CommentsPost::where([
            'post_id' => $data['post_id'],
            'comment_id' => $data['comment_id'],
        ])->update($child);
    }

}
