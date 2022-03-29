<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;

use Tests\TestCase;

class CommentTest extends TestCase
{
    use InteractsWithExceptionHandling;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_run_request()
    {
        $response = $this->get('/');
 
        $response->assertStatus(200);
    }

    public function test_findCommentsByPostId()
    {
        $postId = 1;
        $response = $this->get('api/comments/all?postId='.$postId);
 
        $response->assertStatus(200);
    }

    public function test_CommentsPoststore(){
        $data = [
            'post_id' => '1',
            'comment_id' => '1',
        ];
        //$this->withoutExceptionHandling();
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('api/comments-post/store', $data);

        $response->assertStatus(200);
    }

    public function test_storeComment(){
        $data = [
            'user_name' => 'test_user',
            'text' => 'this is test text',
            'post_id' => '1',
        ];

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('api/comment/store', $data);
        
        $response->assertStatus(200);
    }
}
