<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        // dd($posts);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|unique:posts',
            'title' => 'required|unique:posts',
            'sub_title' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:active,draft',
            'main_photo' => 'nullable|image|max:2048',
            'other_photos.*' => 'nullable|image|max:2048',
            'content' => 'required',
            'main_photo' => 'nullable|image|max:2048',
            'other_photos.*' => 'nullable|image|max:2048',
        ]);

        $post = new Post();
        $post->author = $request->author;
        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category_id;
        $post->status = $request->status;
        $post->content = $request->content;

        if ($request->hasFile('main_photo')) {
            $post->main_photo = $request->file('main_photo')->store('posts', 'public');
        }


        $otherPhotos = [];
        if ($request->hasFile('other_photos')) {
            foreach ($request->file('other_photos') as $photo) {
                $otherPhotos[] = $photo->store('posts', 'public');
            }
        }
        $post->other_photos = json_encode($otherPhotos);

        $post->save();

        return redirect()->route('admin.blog.view')->with('message', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'author' => 'required|unique:posts,author,' . $post->id,
            'title' => 'required|unique:posts,title,' . $post->id,
            'sub_title' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:active,draft',
            'main_photo' => 'nullable|image|max:2048',
            'other_photos.*' => 'nullable|image|max:2048',
            'content' => 'required',
        ]);

        $post->author = $request->author;
        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category_id;
        $post->status = $request->status;
        $post->content = $request->content;

        // Handle main photo
        if ($request->hasFile('main_photo')) {
            // Delete old photo if exists
            if ($post->main_photo) {
                Storage::disk('public')->delete($post->main_photo);
            }
            $post->main_photo = $request->file('main_photo')->store('posts', 'public');
        }

        // Handle other photos
        $otherPhotos = json_decode($post->other_photos) ?? [];

        // Remove photos marked for deletion
        if ($request->has('photos_to_remove')) {
            foreach ($request->photos_to_remove as $photoToRemove) {
                $key = array_search($photoToRemove, $otherPhotos);
                if ($key !== false) {
                    Storage::disk('public')->delete($photoToRemove);
                    unset($otherPhotos[$key]);
                }
            }
            $otherPhotos = array_values($otherPhotos); // Re-index array
        }

        // Add new photos
        if ($request->hasFile('other_photos')) {
            foreach ($request->file('other_photos') as $photo) {
                $otherPhotos[] = $photo->store('posts', 'public');
            }
        }

        $post->other_photos = json_encode($otherPhotos);

        $post->save();

        return redirect()->route('admin.blog.view')->with('message', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('message', 'Action denied!');
        }
        // Delete main photo
        if ($post->main_photo) {
            Storage::disk('public')->delete($post->main_photo);
        }

        // Delete other photos
        if ($post->other_photos) {
            foreach (json_decode($post->other_photos) as $photo) {
                Storage::disk('public')->delete($photo);
            }
        }

        $post->delete();

        return redirect()->route('admin.blog.view')->with('message', 'Post deleted successfully.');
    }
}
