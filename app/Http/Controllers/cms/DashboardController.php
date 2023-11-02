<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user()
            ->username;
        $posts = Post::with('category', 'post_author')->latest()->get();
        $userRole = Auth::user()->role;

        if ($userRole == 'admin') {
            return view('dashboard.admin.index', compact('user', 'posts'));
        } else {
            return view('dashboard', compact('user', 'posts'));
        }

        return view('dashboard', compact('posts'));
    }

    public function category()
    {
        $categories = Category::latest()

            ->get();

        return view('dashboard.admin.category', compact('categories'));
    }

    public function tag()
    {
        $tags = Tag::latest()
            ->get();

        return view('dashboard.admin.tag', compact('tags'));
    }

    public function user()
    {
        $users = User::all();

        return view('dashboard.admin.user', compact('users'));
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect()->back()
            ->with('success', 'user has been deleted');
    }
}
