<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest as CommentStoreRequest;
use App\Http\Requests\CommentsPost\FindByPostIdRequest;
use App\Http\Requests\CommentsPost\StoreRequest;
use App\Services\CommentService;
use App\Services\CommentsPostService;
use App\Services\ResponsesService;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentsPostService,$commentService;
    public function __construct(CommentsPostService $commentsPostService,CommentService $commentService)
    {
        $this->commentsPostService = $commentsPostService;
        $this->commentService = $commentService;
    }

    public function findByPostId(FindByPostIdRequest $request){
        try{
            $result = ResponsesService::success($this->commentsPostService->findByPostId($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function CommentsPoststore(StoreRequest $request){
        try{
            $result = ResponsesService::success($this->commentsPostService->store($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }

    public function store(CommentStoreRequest $request){
        try{
            $result = ResponsesService::success($this->commentService->store($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    }
}
