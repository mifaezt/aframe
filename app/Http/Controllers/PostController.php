<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post; // Импорт модели Post

class PostController extends Controller
{

    // Этот метод отвечает за отображение списка всех постов.
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

}