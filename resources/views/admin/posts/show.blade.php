@extends('admin.layouts.admin')

@section('title', 'View Post')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Post Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>{{ $post->title }}</h2>
                            <h4 class="text-muted">{{ $post->sub_title }}</h4>
                            <p><strong>Author:</strong> {{ $post->author }}</p>
                            <p><strong>Views:</strong> {{ $post->views ?? 0 }}</p>
                            <p><strong>Category:</strong> {{ $post->category->name }}</p>
                            <p><strong>Status:</strong> <span class="badge bg-{{ $post->status == 'active' ? 'success' : 'warning' }}">{{ ucfirst($post->status) }}</span></p>
                            <p><strong>Created:</strong> {{ $post->created_at->format('F d, Y H:i') }}</p>
                            <p><strong>Last Updated:</strong> {{ $post->updated_at->format('F d, Y H:i') }}</p>
                            <p><strong>Slug:</strong> {{ $post->slug }}</p>

                            <h4 class="mt-4">Content</h4>
                            <div class="p-3 border btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                                {!! $post->content !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4>Main Photo</h4>
                            @if($post->main_photo)
                                <img src="{{ asset('storage/' . $post->main_photo) }}" alt="Main Photo" class="mb-3 img-fluid">
                            @else
                                <p>No main photo uploaded</p>
                            @endif

                            <h4 class="mt-4">Other Photos</h4>
                            @if($post->other_photos)
                                <div class="row">
                                    @foreach(json_decode($post->other_photos) as $photo)
                                        <div class="mb-3 col-6">
                                            <img src="{{ asset('storage/' . $photo) }}" alt="Other Photo" class="img-fluid">
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>No other photos uploaded</p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
