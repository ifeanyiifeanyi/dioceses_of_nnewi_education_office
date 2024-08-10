@extends('admin.layouts.admin')

@section('title', 'Content Tags')

@section('css')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-7 mx-auto">
            @if (Session::has('message'))
                <div class="alert alert-primary border-0 bg-grd-primary alert-dismissible fade show">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><span class="material-icons-outlined fs-2">check_circle</span>
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
                <form action="{{ route('admin.tag.store') }}" method="POST">
                    @csrf
                    <div class="card-body p-4">
                        <h5 class="mb-4">Manage Tags</h5>
                        <div class="row mb-3">
                            <label for="input35" class="col-sm-3 col-form-label">Tag Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name"
                                    class="@error('name') border-danger @enderror form-control" id="input35"
                                    placeholder="Enter Category Name" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-grd-primary px-4">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            <hr>

            <div class="card">
                <div class="table-responsive">
                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th>sn</th>
                                <th>Tag</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $tag)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ Str::title($tag->name) }}</th>
                                    <th>{{ Str::title($tag->slug) }}</th>
                                    <th>
                                        <form action="{{ route('admin.tag.destroy', $tag) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure of this action')">Delete</button>
                                        </form>
                                    </th>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
