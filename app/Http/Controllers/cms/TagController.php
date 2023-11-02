<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::latest()->get();
        return view('dashboard.user.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tag $tag)
    {
        $request->validate([

            'title' => 'required|unique:tags,title|max:30|min:4'

        ]);

        $tag->create([

            'title' => Str::title($request->title),

            'slug' => Str::slug($request->title),

        ]);

        $userRole = Auth::user()->role;


        if ($userRole == 'admin') {
            return redirect()->route('admin.tag')
                ->with('success', 'Tag Has Been Created Successfully');
        } else {
            return redirect()->route('tag.index')
                ->with('success', 'Tag Has Been Created Successfully');
        }
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
    public function edit(Tag $tag)
    {
        return view('dashboard.user.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([

            'title' => 'required|unique:tags,title|max:15|min:4'

        ]);

        $tag->update([

            'title' => Str::title($request->title),

            'slug' => Str::slug($request->title),

        ]);

        $userRole = Auth::user()->role;


        if ($userRole == 'admin') {
            return redirect()->route('admin.tag')
                ->with('success', 'Tag Has Been Updated Successfully');
        } else {
            return redirect()->route('tag.index')
                ->with('success', 'Tag Has Been Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        $userRole = Auth::user()->role;


        if ($userRole == 'admin') {
            return redirect()->route('admin.tag')
                ->with('success', 'Tag Has Been Deleted Successfully');
        } else {
            return redirect()->route('tag.index')
                ->with('success', 'Tag Has Been Deleted Successfully');
        }
    }
}
