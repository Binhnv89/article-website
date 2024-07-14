@extends('admin.layout.master')
@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3 mt-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" value="{{$post->title}}" class="form-control" id="title" placeholder="Enter name" name="title">
        </div>
        <div class="mb-3 mt-3">
            <label for="short_content" class="form-label">Short content:</label>
            <input type="text" value="{{$post->short_content}}" class="form-control" id="short_content" placeholder="Enter name" name="short_content">
        </div>
        <div class="mb-3 mt-3">
            <label for="content" class="form-label">Content:</label>
            <input type="text" value="{{$post->content}}" class="form-control" id="content" placeholder="Enter name" name="content">
        </div>
        <div class="mb-3 mt-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3 mt-3">
            <label for="category_id" class="form-label">Categories:</label>
            <select class="form-control" id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <a href="{{ route('post.index') }}" class="btn btn-success">Back to list</a>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
