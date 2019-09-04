<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class PostTest extends TestCase
{
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
        $post = new Post([
            'title' => 'something',
            'body' => 'somethingelse',
        ]);

        $post->save();

        $result = Post::all()->first();

        $this->assertEquals('something', $result->title);
        $this->assertEquals('somethingelse', $result->body);
    }

    public function testUpdateBlogPostTest()
    {
        $post = new Post([
            'title' => 'something',
            'body' => 'somethingelse',
        ]);

        $post->save();

        $result = Post::all()->first();

        $result->title = 'gnihtemos';
        $result->save();

        $updatedResult = Post::all()->first();

        $this->assertEquals('gnihtemos', $updatedResult->title);
        $this->assertEquals('somethingelse', $updatedResult->body);
    }

    public function testDeleteBlogPostTest()
    {
        $post = new Post([
            'title' => 'something',
            'body' => 'somethingelse',
        ]);

        $post->save();

        $result = Post::all()->first();

        $result->delete();

        $emptyResult = Post::all();

        $this->assertEmpty($emptyResult);
    }
}
