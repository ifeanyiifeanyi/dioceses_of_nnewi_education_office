<section id="recent-posts" class="recent-posts section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Recent Posts</h2>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            @foreach ($posts as $post)
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <article>
                        <div class="post-img">
                            @if ($post->main_photo)
                                <img src="{{ asset('storage/' . $post->main_photo) }}" alt="{{ $post->title }}"
                                    class="img-fluid">
                            @else
                                <img src="assets/img/blog/blog-1.jpg" alt="Default Image" class="img-fluid">
                            @endif
                        </div>

                        <p class="post-category">{{ $post->category->name }}</p>

                        <h2 class="title">
                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                        </h2>

                        <div class="d-flex align-items-center">
                            <img src="assets/img/blog/blog-author.jpg" alt=""
                                class="flex-shrink-0 img-fluid post-author-img">
                            <div class="post-meta">
                                <p class="post-author">{{ $post->author }}</p>
                                <p class="post-date">
                                    <time datetime="{{ $post->created_at->format('Y-m-d') }}">
                                        {{ $post->created_at->format('M d, Y') }}
                                    </time>
                                </p>
                            </div>
                        </div>
                    </article>
                </div><!-- End post list item -->
            @endforeach
        </div><!-- End recent posts list -->
    </div>
</section>
