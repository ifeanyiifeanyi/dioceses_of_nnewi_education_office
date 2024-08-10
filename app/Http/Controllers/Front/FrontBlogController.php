<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontBlogController extends Controller
{
    
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->increment('views');

        $categories = Category::withCount('posts')->get();
        $recentPosts = Post::where('status', 'active')
            ->where('id', '!=', $post->id)
            ->take(3)
            ->get();

        return view('frontend.blog-details', compact('post', 'categories', 'recentPosts'));
    }

    public function blog(Request $request)
    {
        $query = Post::with('category')->where('status', 'active');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('content', 'like', "%{$searchTerm}%");
            });
        }

        $posts = $query->latest()->paginate(10);

        $categories = Category::withCount('posts')->get();

        $recentPosts = Post::where('status', 'active')
            ->latest()
            ->take(5)
            ->get();

        return view('frontend.blog', compact('posts', 'categories', 'recentPosts'));
    }


    public function categoryPosts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = Post::where('category_id', $category->id)
            ->where('status', 'active')
            ->latest()
            ->paginate(10);

        $categories = Category::withCount('posts')->get();

        return view('frontend.category_posts', compact('category', 'posts', 'categories'));
    }
}
