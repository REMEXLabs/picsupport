<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Piktos</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

    <div class="container">

    <header>
        @if (Auth::check())
            <p><a href="/auth/logout">Logout</a></p>
            <p><a href="/home">Home</a></p>
        @else
            <p><a href="/auth/login">Login</a></p>
            <p><a href="/auth/register">Register</a></p>
        @endif
    </header>

    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    </div>


    <div class="container">
    @yield('content')
    </div>


    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
