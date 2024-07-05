<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            /* position: relative; */
            /* bottom: 0; */
            width: 100%;
        }

        .footer p {
            /* margin-bottom: 0; */
        }
    </style>
</head>

<body>

    @include('client.layout.header')

    <div class="container mt-5">
        <div class="row">
            @yield('big-title')
            <div class="col-lg-8">
                <div class="row">
                    {{-- <div class="col-sm-6">
                        <h3>Main Content</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                    </div> --}}

                    @yield('main-content')

                </div>
            </div>
            <div class="col-lg-4">
                @yield('sidebar')
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('client.layout.footer')

</body>

</html>
