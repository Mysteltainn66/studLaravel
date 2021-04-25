<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SMN.NET</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
        <link rel="stylesheet" href="css/app.css">


    </head>
    <body>
        <header>
            <div class="wrapper">
                @if (Route::has('login'))
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            {{ config('app.name', 'SMN.NET') }}
                        </a>
                    </div>
                    <div class="navigator">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Register</a>
                        @endauth
                    </div>
                @endif
            </div>
        </header>
        <div class="content py-4">

        </div>

        <footer>
            <div class="copyright">
                <p>&copy; 2021-{{ now()->year }}, original idea. DO NOT STEAL ololololololo!!1</p>
            </div>
        </footer>
    </body>
</html>
