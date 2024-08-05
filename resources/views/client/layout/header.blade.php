<div class="container-fluid p-5 bg-primary text-white text-center">
    @if (Route::has('login'))
        <div class="position-fixed top-0 end-0 p-3 text-end z-10">
            @auth
                <a href="{{ url('/home') }}" class="text-white">Home</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-light">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <h1>Nguyễn Văn Bình News</h1>
    <p>Bài báo điện tử nhanh nhất</p>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">My Website</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="">Giới thiệu</a>
        <a class="navbar-brand" href="">Tin tức</a>
        <a class="navbar-brand" href="">Liên hệ</a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @foreach ($categories as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.by.category', $item->id) }}">{{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
