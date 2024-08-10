@extends('frontend.layouts.front')
@section('title', $category->name . ' - Posts')
@section('front')
<style>
    .header{
        display: none !important;
    }
</style>
<main class="main">
    <!-- Page Title -->
<div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="text-center row d-flex justify-content-center">
          <div class="col-lg-8">
            <h1>{{ $category->name }}</h1>
            <p class="mb-0">Showing all posts in the {{ $category->name }} category</p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('blog') }}">Blog</a></li>
          <li class="current">{{ $category->name }}</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <section class="category-posts">
    <div class="container">
      <div class="row">

        <!-- Main content area -->
        <div class="col-lg-8">
          @forelse($posts as $post)
            <article class="post-entry">
              <div class="post-img">
                @if($post->main_photo)
                  <img src="{{ asset('storage/' . $post->main_photo) }}" alt="{{ $post->title }}" class="img-fluid">
                @endif
              </div>
              <h4 class="entry-title mt-3">
                <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
              </h4>
              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center mb-2"><i class="bi bi-person"></i> <a href="#">{{ $post->author }}</a></li>
                  <li class="d-flex align-items-center mb-2"><i class="bi bi-clock"></i> <time datetime="{{ $post->created_at->format('Y-m-d') }}">{{ $post->created_at->format('M d, Y') }}</time></li>
                  {{-- <li class="d-flex align-items-center mb-2"><i class="bi bi-eye"></i> {{ $post->views ?? 0 }} Views</li> --}}
                </ul>
              </div>
              <div class="entry-content">
                <p>{{ Str::limit(strip_tags($post->content), 200) }}</p>
                <div class="read-more">
                  <a href="{{ route('blog.show', $post->slug) }}">Read More</a>
                </div>
              </div>
            </article>
          @empty
            <p>No posts found in this category.</p>
          @endforelse

          <!-- Pagination -->
          <div class="pagination">
            {{ $posts->links() }}
          </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 sidebar">
          <div class="widgets-container">

            <!-- Categories Widget -->
            <div class="categories-widget widget-item">
              <h3 class="widget-title">Categories</h3>
              <ul class="mt-3">
                @foreach($categories as $cat)
                  <li>
                    <a href="{{ route('category.posts', $cat->slug) }}" @if($cat->id == $category->id) class="active" @endif>
                      {{ $cat->name }} <span>({{ $cat->posts_count }})</span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div><!--/Categories Widget -->

            <!-- You can add more sidebar widgets here -->

          </div>
        </div>

      </div>
    </div>
  </section>
</main>
@endsection
