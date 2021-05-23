<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Bootstrap 5.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
          crossorigin="anonymous">

    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body>


<header>
    <div class="wrapper">
        <div class="logo">
            <a href="{{ url('/') }}">
                {{ config('app.name', 'SMN.NET') }}
            </a>
        </div>

                <!-- Authentication Links -->

                @guest
            <div class="navigator">
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <div class="navigator">

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}">Control Panel</a>
                    @endif

                    @impersonate()
                        <a href="{{ route('admin.impersonate.destroy') }}">Exit from "Login As"</a>
                    @endimpersonate

                    <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                </div>
            </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
        </div>
                @endguest
    </div>
</header>
    <main>
        <div class="empty">
            @yield('content')
        </div>
    </main>
<footer>
    <div class="copyright">
        <p>&copy; 2021-30XX, original idea. DO NOT STEAL ololololololo!!1</p>
    </div>
</footer>
</body>
</html>
