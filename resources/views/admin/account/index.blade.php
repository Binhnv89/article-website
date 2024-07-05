@extends('admin.layout.master')
@section('content')
    <div class="container mt-3">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Quản lý tài khoản</h1>
        </div>
        <p>Welcome to the admin Quản lý tài khoản!</p>

        {{-- <a href="{{ route('account.create') }}" class="btn btn-info">Add</a> --}}

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($account as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
