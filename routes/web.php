<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\BlogController;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\FrontBlogController;

Route::get('/migrate', function () {
    Artisan::call('migrate', ["--force" => true]);
    Artisan::call('db:seed', ['--class' => 'AdminUserSeeder']);
    Artisan::call('optimize:clear');
    Artisan::call('storage:link');

    return "Migrations have been run, AdminUserSeeder executed, and optimization cache cleared, storage link added.";
});
Route::get('/', function () {
    $posts = Post::inRandomOrder()->limit(3)->get();
    return view('frontend.home', compact('posts'));
})->name('home');

Route::get('/dashboard', function () {
    $posts = Post::latest()->get();
    return view('admin.dashboard', compact('posts'));
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::controller(FrontBlogController::class)->group(function () {
    Route::get('/blog/{slug}', 'show')->name('blog.show');
    Route::get('/category/{slug}', 'categoryPosts')->name('category.posts');
    Route::get('/blog', 'blog')->name('blog');
});



Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->group(function () {

    Route::get('/logout', function () {
        // dd('here');
        Session::flush();
        Auth::guard('web')->logout();
        return redirect()->route('login');
    })->name('admin.logout');

    Route::controller(CategoryController::class)->group(function () {
        Route::get('content-categories', 'index')->name('admin.category.view');
        Route::post('content-categories', 'store')->name('admin.category.store');
        Route::delete('content-categories/{category}', 'destroy')->name('admin.category.destroy');
    });

    Route::controller(TagController::class)->group(function () {
        Route::get('content-tags', 'index')->name('admin.tag.view');
        Route::post('content-tags', 'store')->name('admin.tag.store');
        Route::delete('content-tags/{tag}', 'destroy')->name('admin.tag.destroy');
    });


    Route::controller(BlogController::class)->group(function () {
        Route::get('blogs', 'index')->name('admin.blog.view');
        Route::get('blogs/create', 'create')->name('admin.blog.create');
        Route::post('blogs', 'store')->name('admin.blog.store');
        Route::get('blogs/{post}/edit', 'edit')->name('admin.blog.edit');
        Route::get('blogs/{post}/show', 'show')->name('admin.blog.show');
        Route::put('blogs/{post}', 'update')->name('admin.blog.update');
        Route::get('blogs/{post}/del', 'destroy')->name('admin.blog.destroy');
    });
});
require __DIR__ . '/auth.php';
