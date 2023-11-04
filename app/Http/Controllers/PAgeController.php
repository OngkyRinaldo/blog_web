<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class Pagecontroller extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->when(request('search'), function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('content', 'like', '%' . request('search') . '%');
            })
            ->with('category', 'post_author')
            ->latest()
            ->get();

        return view('index', compact('posts'));
    }
}
