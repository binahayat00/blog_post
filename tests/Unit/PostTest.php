<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;

class PostTest extends TestCase
{
    use InteractsWithExceptionHandling;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_findPostById(){
        $id = 1;
        $response = $this->get('api/post?id='.$id);
 
        $response->assertStatus(200);
    }

}
