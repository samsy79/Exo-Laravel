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

@section('content')
<div class="container position-absolute top-50 start-50 translate-middle">
    <div style="width: 600px" class="card border-success">
        <div>
           
        </div>
        
        <div class="card-header  bold bg-success text-white">
            @yield('title')
        </div>
        <div>
            @yield('contents')
        </div>
    </div>
        