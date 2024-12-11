@extends('layouts.front')

@section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="text-center">
                    <h2 class="card-title">Petlogへようこそ</h2>
                    <p class="card-text">ペットの健康を守りましょう。</p>

                    @guest
                        @if (Route::has('login'))
                            <a class="nav-link" href="{{ route('login') }}">
                                <button class="btn btn-outline-light" type="button">
                                    {{ __('messages.login') }}
                                </button>
                            </a>
                        @endif
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">
                                <button class="btn btn-outline-light" type="button">
                                    {{ __('messages.signup') }}
                                </button>
                            </a>
                        @endif
                    @endguest
                </div>
            </div>
        </div>
    </div>
</body>
@endsection