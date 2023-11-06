<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
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

    public function posts()
    {
        $posts = Post::with('category', 'post_author')
            ->latest()
            ->get();

        return view('pages.post.index', compact('posts'));
    }

    public function post(Post $post)
    {
        return view('pages.post.detailPost', compact('post'));
    }

    public function category(Category $category)
    {
        $posts = Post::query()
            ->where('category_id', $category->id)
            ->with('category')
            ->latest()
            ->get();
        return view('pages.category.index', compact('posts', 'category'));
    }

    public function author(User $user)
    {
        $posts = Post::query()
            ->where('author', $user->id)
            ->with('category')
            ->latest()
            ->get();


        return view('pages.author.index', compact('user', 'posts'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()
            ->with('category')
            ->latest()
            ->get();

        return view('pages.tag.index', compact('posts', 'tag'));
    }
}
