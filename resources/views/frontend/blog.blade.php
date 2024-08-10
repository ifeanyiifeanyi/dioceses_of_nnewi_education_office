@extends('frontend.layouts.front')

@section('title', 'Blog')

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
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Blog</h1>
              <p class="mb-0">Stay updated with our latest posts and insights</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="current">Blog</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">
      <div class="container">
        <div class="row gy-4">
          @forelse($posts as $post)
            <div class="col-lg-4">
              <article>
                <div class="post-img">
                  @if($post->main_photo)
                    <img src="{{ asset('storage/' . $post->main_photo) }}" alt="{{ $post->title }}" class="img-fluid">
                  @endif
                </div>

                <p class="post-category">{{ $post->category->name }}</p>

                <h2 class="title">
                  <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                </h2>

                <div class="d-flex align-items-center">
                  <img src="{{ asset('storage/' . $post->author_photo) }}" alt="" class="img-fluid post-author-img flex-shrink-0">
                  <div class="post-meta">
                    <p class="post-author">{{ $post->author }}</p>
                    <p class="post-date">
                      <time datetime="{{ $post->created_at->format('Y-m-d') }}">{{ $post->created_at->format('M d, Y') }}</time>
                    </p>
                  </div>
                </div>
              </article>
            </div><!-- End post list item -->
          @empty
            <div class="col-12">
              <p>No posts found.</p>
            </div>
          @endforelse
        </div>
      </div>
    </section><!-- /Blog Posts Section -->

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">
      <div class="container">
        <div class="d-flex justify-content-center">
          {{ $posts->links() }}
        </div>
      </div>
    </section><!-- /Blog Pagination Section -->

</main>

@endsection
