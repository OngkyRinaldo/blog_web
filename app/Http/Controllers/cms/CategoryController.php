<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('dashboard.user.category.index', compact('categories'));
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Category $category)
    {
        $request->validate([

            'title' => 'required|unique:categories,title|max:30|min:4'

        ]);

        $category->create([

            'title' => Str::title($request->title),

            'slug' => Str::slug($request->title),

        ]);


        $userRole = Auth::user()->role;


        if ($userRole == 'admin') {
            return redirect()->route('admin.category')
                ->with('success', 'Category Has Been Created Successfully');
        } else {
            return redirect()->route('category.index')
                ->with('success', 'Category Has Been Created Successfully');
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
    public function edit(Category $category)
    {
        return view('dashboard.user.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([

            'title' => 'required|unique:categories,title|max:15|min:4'

        ]);

        $category->update([

            'title' => Str::title($request->title),

            'slug' => Str::slug($request->title),

        ]);

        $userRole = Auth::user()->role;


        if ($userRole == 'admin') {
            return redirect()->route('admin.category')
                ->with('success', 'Category Has Been Updated Successfully');
        } else {
            return redirect()->route('category.index')
                ->with('success', 'Category Has Been Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        $userRole = Auth::user()->role;


        if ($userRole == 'admin') {
            return redirect()->route('admin.category')
                ->with('success', 'Category Has Been Deleted Successfully');
        } else {
            return redirect()->route('category.index')
                ->with('success', 'Category Has Been Deleted Successfully');
        }
    }
}
