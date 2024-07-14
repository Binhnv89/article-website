@extends('admin.layout.master')
@section('content')
    <div class="container mt-3">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Quản lý tin tức</h1>
        </div>
        <p>Welcome to the admin Quản lý tin tức!</p>
        <div class="row justify-content-end mb-3">
            <div class="col-md-4">
                <form action="{{ route('post.index') }}" method="GET" class="d-flex">
                    <div class="flex-grow-1 me-2">
                        <label for="keyword" class="form-label">Tìm kiếm</label>
                        <input type="text" class="form-control" id="keyword" name="keyword"
                            value="{{ request('keyword') }}">
                    </div>
                    <div class="d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
        <a href="{{ route('post.create') }}" class="btn btn-info">Add</a>

        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Categories</th>
                    <th>Image</th>
                    <th>Short content</th>
                    <th>Content</th>
                    <th>Views</th>
                    {{-- <th>Create at</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ Str::limit($item->title, 50) }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>
                            @if ($item->image)
                                @if (Storage::exists('public/' . $item->image))
                                    {{-- kiểm tra xem trog thư mục ... có tồn tại ảnh này ko --}}
                                    <img src="{{ asset('storage/' . $item->image) }}" width="150px" height="100px"
                                        alt="">
                                @else
                                    <span class="text-danger"> <img src="{{ $item->image }}" width="150px" height="100px"
                                            alt=""></span>
                                @endif
                            @endif
                        </td>

                        <td>{{ Str::limit($item->short_content, 80) }}</td>
                        <td>{{ Str::limit($item->content, 80) }}</td>
                        <td>{{ $item->views }}</td>
                        {{-- <td>{{ $item->created_at }}</td> --}}
                        <td>
                            <a href="{{ route('post.show', $item->id) }}" class="btn btn-info mb-1 w-100">Show</a>
                            <a href="{{ route('post.edit', $item->id) }}" class="btn btn-warning mb-1 w-100">Edit</a>
                            <form action="{{ route('post.destroy', $item->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger w-100"
                                    onclick="return(confirm('Are you sure?'))">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
