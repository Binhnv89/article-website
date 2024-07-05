@extends('admin.layout.master')
@section('content')
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="mb-3 mt-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter name" name="title">
        </div>
        <div class="mb-3 mt-3">
            <label for="short_content" class="form-label">Short content:</label>
            <input type="text" class="form-control" id="short_content" placeholder="Enter name" name="short_content">
        </div>
        <div class="mb-3 mt-3">
            <label for="content" class="form-label">Content:</label>
            <input type="text" class="form-control" id="content" placeholder="Enter name" name="content">
        </div>
        <div class="mb-3 mt-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3 mt-3">
            <label for="category_id" class="form-label">Categories:</label>
            <select class="form-control" id="category_id" name="category_id">
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
