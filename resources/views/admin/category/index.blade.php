@extends('admin.layout.master')
@section('content')
    <div class="container mt-3">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Quản lý loại tin</h1>
        </div>
        <p>Welcome to the admin Quản lý loại tin!</p>

        <a href="{{ route('category.create') }}" class="btn btn-info">Add</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('category.destroy', $item->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return(confirm('Are you sure?'))">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
