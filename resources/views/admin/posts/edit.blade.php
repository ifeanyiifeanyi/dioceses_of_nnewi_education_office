@extends('admin.layouts.admin')

@section('title', 'Edit Post')

@section('css')
    <style>
        .border-error {
            border-image: linear-gradient(90deg, #ff758c 0%, #ff7eb3 100%) !important;
            border-style: solid !important;
            border-width: 4px !important;
            padding: 5px !important;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card border-top border-3 border-danger rounded-0">
                <div class="card-header py-3 px-4">
                    <h5 class="mb-0 text-danger">Edit blog post</h5>
                </div>
                <div class="card-body p-4">
                    <form class="row g-3" method="POST" action="{{ route('admin.blog.update', $post->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label class="form-label">Author</label>
                            <input type="text" name="author"
                                class="form-control @error('author') border-danger @enderror rounded-0"
                                placeholder="Author ..." value="{{ old('author', $post->author) }}">
                            @error('author')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Post Title</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}"
                                class="form-control @error('title') border-danger @enderror rounded-0"
                                placeholder="Post Title">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Sub Title</label>
                            <input type="text" name="sub_title" value="{{ old('sub_title', $post->sub_title) }}"
                                class="form-control @error('sub_title') border-danger @enderror rounded-0"
                                placeholder="Sub Title">
                            @error('sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select name="category_id"
                                class="form-select rounded-0 @error('category_id') border-danger @enderror">
                                <option value="">Choose...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select rounded-0 @error('status') border-danger @enderror">
                                <option value="active" {{ old('status', $post->status) == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>
                                    Draft</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Main Photo</label>
                            @if ($post->main_photo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $post->main_photo) }}" alt="Main photo"
                                        style="width: 200px; height: auto;">
                                </div>
                            @endif
                            <input type="file" name="main_photo"
                                class="form-control rounded-0 @error('main_photo') border-danger @enderror">
                            @error('main_photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Other Photos</label>
                            <div id="other-photos-container">
                                @if ($post->other_photos)
                                    @foreach (json_decode($post->other_photos) as $index => $photo)
                                        <div class="input-group mb-3">
                                            <img src="{{ asset('storage/' . $photo) }}" alt="Other photo"
                                                style="width: 100px; height: auto;">
                                            <input type="hidden" name="existing_photos[]" value="{{ $photo }}">
                                            <button class="btn btn-outline-secondary remove-existing-photo" type="button"
                                                data-photo="{{ $photo }}">Remove</button>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="input-group mb-3">
                                    <input type="file" name="other_photos[]" class="form-control rounded-0">
                                    <button class="btn btn-outline-secondary remove-photo" type="button">Remove</button>
                                </div>
                            </div>
                            <button type="button" id="add-photo" class="btn btn-primary mt-2">Add Photo</button>
                            @error('other_photos')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Content</label>
                            <textarea id="editor" name="content" class="form-control rounded-0 @error('content') border-danger @enderror" rows="5">{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-grd-danger px-4 rounded-0">Update</button>
                                <a href="{{ route('admin.blog.view') }}" class="btn btn-grd-info px-4 rounded-0">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('other-photos-container');
            const addButton = document.getElementById('add-photo');

            addButton.addEventListener('click', function() {
                const newInput = document.createElement('div');
                newInput.className = 'input-group mb-3';
                newInput.innerHTML = `
            <input type="file" name="other_photos[]" class="form-control rounded-0">
            <button class="btn btn-outline-secondary remove-photo" type="button">Remove</button>
        `;
                container.appendChild(newInput);
            });

            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-photo')) {
                    e.target.closest('.input-group').remove();
                }
                if (e.target.classList.contains('remove-existing-photo')) {
                    const photoToRemove = e.target.getAttribute('data-photo');
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'photos_to_remove[]';
                    hiddenInput.value = photoToRemove;
                    container.appendChild(hiddenInput);
                    e.target.closest('.input-group').remove();
                }
            });
        });
    </script>
@endsection
