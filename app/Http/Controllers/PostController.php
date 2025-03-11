<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post; // Импорт модели Post

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }
}