@extends('admin.layout.master')
@section('content')
    <form action="{{ route('category.update',$category->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                value="{{ $category->name}}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <div class="mb-3 d-flex">
                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="active" name="status" value="active" {{ $category->status == 'active' ? 'checked' : '' }} >
                    <label class="form-check-label" for="active">Active</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="inactive" name="status" value="inactive" {{ $category->status == 'inactive' ? 'checked' : '' }} >
                    <label class="form-check-label" for="inactive">Inactive</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
