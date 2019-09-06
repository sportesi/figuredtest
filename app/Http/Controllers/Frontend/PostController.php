<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = new Post($request->only(['title', 'body']));
        $post->save();

        return redirect()->route('frontend_home');
    }

    public function update(Request $request, $id)
    {
        $post = Post::where(['_id' => $id])->get()->first();

        $updateData = $request->only(['title', 'body']);

        $post->title = $updateData['title'];
        $post->body = $updateData['body'];

        $post->save();

        return redirect()->route('frontend_home');
    }
}
