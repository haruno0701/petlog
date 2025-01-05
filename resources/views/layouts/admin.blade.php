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
        <div class="container">
            @foreach ($pets as $pet)
                <div class="bread">
                    <ul>
                        <li><a href="http://127.0.0.1:8080/admin/pet/top">ペット一覧</a></li>
                        <li><a href="http://127.0.0.1:8080/admin/pet/vital?id=17">ぽん</a></li>
                    </ul>
                </div>
            @endforeach

            <main class="py-4">
                @yield('content')
            </main>

            <footer class="footer">
                <div class="container text-center">
                    <a href="{{ route('admin.pet.index') }}" role="button" class="btn btn-primary">
                        ペット
                    </a>
                    <button class="btn btn-primary" type="button">
                        体重比較
                    </button>
                    <button class="btn btn-primary" type="button">
                        オススメ
                    </button>
                </div>
            </footer>
        </div>
</body>

</html>