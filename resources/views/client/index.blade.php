@extends('client.layout.master')
@section('big-title')
    <h2 class="text-center text-uppercase">
        {{ isset($category->name) ? 'Tin Tức về ' . $category->name : 'Tin tức mới nhất' }}
    </h2>
    <hr>
    <div class="row justify-content-end mb-3">
        <div class="col-md-4">
            <form action="{{ route('home') }}" method="GET" class="d-flex">
                <div class="flex-grow-1 me-2">
                    <label for="search" class="form-label">Tìm kiếm</label>
                    <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}">
                </div>
                <div class="d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('main-content')
    @foreach ($latestNews as $item)
        <div class="col-sm-6 mb-3">
            <a href="{{ route('posts.show', $item->id) }}">
                @if ($item->image)
                    @if (Storage::exists('public/' . $item->image))
                        <img src="{{ asset('storage/' . $item->image) }}" width="150px" height="100px" alt="">
                    @else
                        <img src="{{ $item->image }}" width="100%" height="150px"alt="">
                    @endif
                @endif
            </a>
            <a href="{{ route('posts.show', $item->id) }}" class="text-decoration-none text-black">
                <h4>{{ Str::limit($item->title, 25) }}</h4>
            </a>
            <p class=" text-black-50 mb-0">{{ Str::limit($item->short_content, 100) }}</p>
            <p class=" text-black-50 mb-0">Chủ đề: {{ $item->category->name}}</p>
            <i class="text-decoration-none text-black-50">Ngày đăng: {{ $item->created_at->format('Y-m-d') }} - Lượt xem:
                {{ $item->views }}</i><br>

        </div>
    @endforeach
    {{-- {{ $data->links() }} --}}
@endsection
@section('sidebar')
    <div class="sidebar bg-light p-2">
        <h4 class="text-center">Tin Xem Nhiều Nhất </h4>
        @foreach ($data as $item)
            <a href="{{ route('posts.show', $item->id) }}"
                class="text-decoration-none text-black">{{ Str::limit($item->title, 25) }}</a> <br>
            <i class="text-decoration-none text-black-50">Ngày đăng: {{ $item->created_at }}</i><br>
            <hr>
        @endforeach
        <h4 class="text-center">Tin Mới Nhất </h4>
        @foreach ($latestNews as $item)
            <a href="{{ route('posts.show', $item->id) }}"
                class="text-decoration-none text-black">{{ Str::limit($item->title, 25) }}</a> <br>
            <i class="text-decoration-none text-black-50">Ngày đăng: {{ $item->created_at }}</i><br>
            <hr>
        @endforeach
    </div>
    {{ $latestNews->links() }}
@endsection
