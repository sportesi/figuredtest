<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at')->paginate(5);

        return view('home', [
            'posts' => $posts,
            'isLoggedIn' => auth()->user() ? 1 : 0
        ]);
    }
}
