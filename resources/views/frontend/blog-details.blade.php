@extends('frontend.layouts.front')

@section('title', $post->title)

@section('front')
<style>
    .header{
        display: none !important;
    }
</style>
<!-- Page Title -->
<div class="page-title" data-aos="fade">
    <div class="heading">
        <div class="container">
            <div class="text-center row d-flex justify-content-center">
                <div class="col-lg-8">
                    <h1>{{ $post->title }}</h1>
                    <p class="mb-0">{{ $post->sub_title }}</p>
                </div>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="/">Home</a></li>
                <li class="current">Blog Details</li>
            </ol>
        </div>
    </nav>
</div><!-- End Page Title -->

<div class="container">
    <div class="row">

        <div class="col-lg-8">

            <!-- Blog Details Section -->
            <section id="blog-details" class="blog-details section">
                <div class="container">

                    <article class="article">

                        @if ($post->main_photo)
                            <div class="post-img">
                                <img src="{{ asset('storage/' . $post->main_photo) }}" alt="{{ $post->title }}"
                                    class="img-fluid">
                            </div>
                        @endif

                        <h2 class="title">{{ $post->title }}</h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="#">{{ $post->author }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="#"><time
                                            datetime="{{ $post->created_at->format('Y-m-d') }}">{{ $post->created_at->format('M d, Y') }}</time></a>
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
                                        href="#">{{ $post->views ?? 0 }} Views</a></li>
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            {!! $post->content !!}
                        </div><!-- End post content -->

                        @if ($post->other_photos)
                            <div class="other-photos d-flex justify-content-center">
                                @foreach (json_decode($post->other_photos) as $photo)
                                    <img style="border-radius: 10px" src="{{ asset('storage/' . $photo) }}" class="img-fluid w-25 m-2 img-responsive img-thumbnail"
                                        alt="Additional photo">
                                @endforeach
                            </div>
                        @endif

                    </article>

                </div>
            </section><!-- End Blog Details Section -->

        </div>

        <div class="col-lg-4 sidebar">

            <div class="widgets-container">


                <!-- Categories Widget -->
                <div class="categories-widget widget-item">
                    <h3 class="widget-title">Categories</h3>
                    <ul class="mt-3">
                        @foreach ($categories as $category)
                            <li><a href="{{ route('category.posts',  $category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div><!--/Categories Widget -->

                <!-- Recent Posts Widget -->
                <div class="recent-posts-widget widget-item">
                    <h3 class="widget-title">Recent Posts</h3>
                    @foreach ($recentPosts as $recentPost)
                        <div class="post-item">
                            @if ($recentPost->main_photo)
                                <img src="{{ asset('storage/' . $recentPost->main_photo) }}"
                                    alt="{{ $recentPost->title }}" class="flex-shrink-0">
                            @endif
                            <div>
                                <h4><a href="">{{ $recentPost->title }}</a></h4>
                                <time
                                    datetime="{{ $recentPost->created_at->format('Y-m-d') }}">{{ $recentPost->created_at->format('M d, Y') }}</time>
                            </div>
                        </div>
                    @endforeach
                </div><!--/Recent Posts Widget -->

            </div>

        </div>

    </div>
</div>
@endsection
