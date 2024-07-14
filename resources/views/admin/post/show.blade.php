@extends('admin.layout.master')

@section('content')
    <div class="container mt-3">
        {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Chi tiết tin tức</h1>
    </div> --}}

        <div class="card mb-3">
            <div class="card-header">
                <h3>{{ $post->title }}</h3>
            </div>
            <div class="card-body">
                    <div class="mb-3 d-flex">
                        <label for="category" class="form-label"><strong>Category:</strong></label>
                        <p>{{ $post->category->name }}</p>
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="views" class="form-label"><strong>Views:</strong></label>
                        <p>{{ $post->views }}</p>
                    </div>

                <div class="mb-3">
                    <label for="image" class="form-label"><strong>Image:</strong></label><br>
                    @if ($post->image)
                        @if (Storage::exists('public/' . $post->image))
                            <img src="{{ asset('storage/' . $post->image) }}" width="300px" alt="">
                        @else
                            <img src="{{ $post->image }}" width="300px" alt="">
                        @endif
                    @endif
                </div>
                <div class="mb-3">
                    <label for="short_content" class="form-label"><strong>Short content:</strong></label>
                    <p>{{ $post->short_content }}</p>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label"><strong>Content:</strong></label>
                    <p>{{ $post->content }}</p>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('post.index') }}" class="btn btn-success">Back to list</a>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('post.destroy', $post->id) }}" method="post" class="d-inline-block">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
