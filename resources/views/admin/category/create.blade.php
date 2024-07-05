@extends('admin.layout.master')
@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <div class="mb-3 d-flex">
                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="active" name="status" value="active" checked>
                    <label class="form-check-label" for="active">Active</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="inactive" name="status" value="inactive">
                    <label class="form-check-label" for="inactive">Inactive</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
