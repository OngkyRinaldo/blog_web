<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category', 'post_author')->latest()->get();
        return view('dashboard.user.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();

        $categories = Category::all();

        return view('dashboard.user.post.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|unique:posts,title|min:38',
            'category' => 'required',
            'content' => 'required',
            'tags' => 'required',
            'image' => 'required|image|mimes:jpg,png|max:1024'

        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        $post = Post::create([
            'title' => Str::title($request->title),
            'slug' => Str::slug($request->title),
            'category_id' => $request->category,
            'descriptions' => Str::limit(strip_tags($request->content, 100)),
            'content' => strip_tags($request->content),
            'author' => auth()->id(),
            'image' => $image->hashName(),
        ]);

        $post->tags()->sync($request->tags);

        //redirect to index
        return redirect()->route('post.index')
            ->with('success', 'Post Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
