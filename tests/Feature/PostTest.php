<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase; 

    public function test_can_create_post()
    {
        $response = $this->post('/posts', [
            'title' => 'Test Title',
            'content' => 'Test Content',
        ]);

        $response->assertRedirect('/posts');
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Title',
            'content' => 'Test Content',
        ]);
    }

    public function test_can_list_posts()
    {
        $posts = Post::factory()->count(3)->create();

        $response = $this->get('/posts');
        $response->assertStatus(200);
        foreach($posts as $post){
            $response->assertSeeText($post->title); // Adjust as needed
        }
    }
}
