<?php

namespace App\Http\Controllers\cms\user;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $posts = Post::with('category', 'post_author')->latest()->get();

        return view('dashboard', compact('posts'));
    }
}
