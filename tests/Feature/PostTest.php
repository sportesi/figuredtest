<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class PostTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        DB::connection('mongodb')->collection('posts')->delete();
    }

    public function tearDown()
    {
        parent::tearDown();

        DB::connection('mongodb')->collection('posts')->delete();
    }

    public function testCreateBlogPostTest()
    {
        $user = factory(User::class)->create();

        $reponse = $this->actingAs($user)->post('/post', [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ]);

        $reponse->assertStatus(302);

        $posts = DB::connection('mongodb')->collection('posts')->get();

        $this->assertGreaterThan(0, $posts->count());
    }

    public function testUpdateBlogPostTest()
    {
        $post = factory(Post::class)->create();
        $user = factory(User::class)->create();

        $reponse = $this->actingAs($user)->put('/post/edit/' . $post->_id, [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ]);

        $reponse->assertStatus(302);

        $updatedPost = Post::where(['_id' => $post->_id])->get()->first();

        $this->assertNotEquals($post->title, $updatedPost->title);
        $this->assertNotEquals($post->body, $updatedPost->body);
    }

    public function testDeleteBlogPostTest()
    {
        $post = factory(Post::class)->create();
        $user = factory(User::class)->create();

        $reponse = $this->actingAs($user)->delete('/post/' . $post->_id, [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ]);

        $reponse->assertStatus(302);

        $updatedPost = Post::where(['_id' => $post->_id])->get()->first();

        $this->assertNull($updatedPost);
    }
}
