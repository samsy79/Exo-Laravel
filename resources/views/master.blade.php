<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<body>
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('index')}}">LOGO</a>
                <div class="d-flex">
                    <a href="{{route('logout')}}" class="btn btn-danger me-4"> LOGOUT</a>
                <h1 class="text-center">Ecole 229</h1>
                </div>
                
            </div>
        </nav>

    </header>
    <div>
        @yield('content')
    </div>
    
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>
