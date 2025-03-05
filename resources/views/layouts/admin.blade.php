<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<body>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/admin.js') }}" defer></script>

        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        <link href="{{ asset('css/create.css') }}" rel="stylesheet">
    </head>


    <div id="app">

        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Petlog') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                    </ul>
                    <ul class="navbar-nav">

                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('messages.logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        

            <main class="py-4">
                @yield('content')
            </main>

            <footer class="footer">
                <div class="container text-center">
                    <a href="{{ route('admin.pet.index') }}" role="button" class="btn btn-primary">
                        ペット
                    </a>
                    <a href="{{ route('admin.pet.comparison') }}" role="button" class="btn btn-primary">
                        体重比較
                    </a>
                    <!-- <button class="btn btn-primary" type="button">
                        オススメ
                    </button> -->
                </div>
            </footer>
        </div>
</body>

</html>