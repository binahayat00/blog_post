<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\FindByIdRequest;
use App\Services\PostService;
use App\Services\ResponsesService;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function findById(FindByIdRequest $request){
        try{
            $result = ResponsesService::success($this->postService->findById($request));
        }
        catch(Exception $e){
            $result = ResponsesService::exception($e);
        }
        return response()->json($result,$result['status']);
    
    }
}
