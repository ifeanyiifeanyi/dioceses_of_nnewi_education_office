@extends('admin.layouts.admin')

@section('title', 'Blog Content')

@section('css')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
                <div class="border-0 alert alert-primary bg-grd-primary alert-dismissible fade show">
                    <div class="d-flex align-items-center">
                        <div class="text-white font-35"><span class="material-icons-outlined fs-2">check_circle</span>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Success Message</h6>
                            <div class="text-white">{{ Session('message') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Blog Content</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ Str::title($post->title) }}</th>
                                <th>{{ Str::title($post->sub_title) }}</th>
                                <th>{{ Str::title($post->category->name) }}</th>
                                <th>{{ str::title($post->author) }}</th>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.blog.show', $post) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a onclick="return confirm('Are you sure of this action ?')" href="{{ route('admin.blog.destroy', $post) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
