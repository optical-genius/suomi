<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('../public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('../public/css/style.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                       Учим финский язык
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                                @auth

                            <li><a href="{{ url('/word') }}">Главная</a></li>

                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Тренировка с финского
                                </button>
                                <div class="dropdown-menu">
                                    <li> <a href="{{ url('/suomitrain') }}">Тренировка с финского</a></li>
                                    <li><a href="{{ url('/randomsuomi') }}">10 случайных финских слов</a></li>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Тренировка с русского
                                </button>
                                <div class="dropdown-menu">
                                    <li> <a href="{{ url('/russiantrain') }}">Тренировка с русского</a></li>
                                    <li><a href="{{ url('/randomrussian') }}">10 случайных русских слов</a></li>

                                    <div class="dropdown-divider"></div>
                                </div>
                            </div>









                                    <li><a href="{{ url('/addlessons') }}">Добавить урок (слова по тематике)</a></li>
                                     <li><a href="{{ url('/lessons') }}">Все уроки</a></li>

                                @else
                                    <li><a href="{{ route('login') }}">Вход</a></li>
                                    <li> <a href="{{ route('register') }}">Регистрация</a></li>
                                @endauth
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
