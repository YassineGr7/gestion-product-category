<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel Crud')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .logged {
            width: 40% !important;
        }
    </style>
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    <a class="nav-link" href="{{ route('product') }}">Products</a>
                    <a class="nav-link" href="{{ route('category') }}">Categories</a>
                </div>
            </div>

            {{-- Check if the user is authenticated before showing the logout button --}}
            @auth
                <div class="ml-auto">
                    <div class="dropdown">
                        <button class="p-3 mx-5 dropdown-toggle " style="border-radius: 100%;outline: none"
                            id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <span style="font-weight: 500;">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            {{-- Add additional dropdown items if needed --}}
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endauth
        </div>
    </nav>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="mt-4 text-center col-md-6">
            <h3>Crud Project using laravel 10.x , Bootstrap 5.3</h3>
            <hr>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="mt-4 text-center col-md-10">
            @yield('content')
        </div>
        <div class="col-md-1"></div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
