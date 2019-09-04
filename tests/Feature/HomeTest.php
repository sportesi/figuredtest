<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        DB::connection('mongodb')->collection('posts')->delete();

        factory(Post::class, 50)->create();
    }

    public function tearDown()
    {
        DB::connection('mongodb')->collection('posts')->delete();
    }

    public function testSeeBlogPostsOnHomepage()
    {
        $response = $this->get('/');

        $posts = Post::orderBy('created_at')->take(5)->get();

        foreach ($posts as $post) {
            $response->assertSee($post->title);
        }
    }
}
