<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $(".dropdown-trigger").dropdown();
            $('.tabs').tabs();

            $('.carousel').carousel({

            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems, options);
        });
    </script>




    <style>
        [type="checkbox"]+span:not(.lever) {
            position: relative;
            padding-left: 35px;
            cursor: pointer;
            display: inline-block;
            height: 17px;
            line-height: 18px;
            font-size: 1rem;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .pagination li {
            display: inline-block;
            border-radius: 2px;
            text-align: center;
            vertical-align: top;
            height: 30px;
            width: 30px;
        }

        .pagination li a {
            color: #444;
            display: inline-block;
            font-size: 1rem;
            padding: 0 10px;
            line-height: 30px;
        }
    </style>

</head>
<body>



<nav>
    <div class="nav-wrapper">
        <div class="container">
            <a href="/word" class="brand-logo"><img width="200px" src="/img/logo.svg"></img></a>
        </div>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <div class="container">
            <ul class="right hide-on-med-and-down">
                @auth


                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdown4">Словарь<i class="material-icons right">arrow_drop_down</i></a>
                    </li>

                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdown3">Грамматика<i class="material-icons right">arrow_drop_down</i></a>
                    </li>

                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdown1">Тренировка с финского<i class="material-icons right">arrow_drop_down</i></a>
                    </li>

                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdown2">Тренировка с русского<i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}">Вход</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Регистрация</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    @auth

        <li>
            <a href="{{ url('/word') }}">Мои слова (мой словарь)</a>
        </li>
        <li>
            <a href="{{ url('/addlessons') }}">Добавить урок (слова по тематике)</a>
        </li>
        <li>
            <a href="{{ url('/lessons') }}">Все уроки</a>
        </li>
        <li>
            <a href="{{ url('/suomitrain') }}">Тренировка с финского</a>
        </li>
        <li>
            <a href="{{ url('/randomsuomi') }}">10 случайных финских слов</a>
        </li>
        <li>
            <a href="{{ url('/russiantrain') }}">Тренировка с русского</a>
        </li>
        <li>
            <a href="{{ url('/randomrussian') }}">10 случайных русских слов</a>
        </li>
        <li>
            <a href="{{ url('/vocabulary') }}">Словарь</a>
        </li>
        <li>
            <a href="{{ url('/jstest') }}">Поиск и добавление слов в мой словарь (тестовая функция)</a>
        </li>
    @else
        <li>
            <a href="{{ route('login') }}">Вход</a>
        </li>
        <li>
            <a href="{{ route('register') }}">Регистрация</a>
        </li>
    @endauth
</ul>

<ul id="dropdown1" class="dropdown-content">
    <li>
        <a href="{{ url('/suomitrain') }}">Тренировка с финского</a>
    </li>
    <li>
        <a href="{{ url('/randomsuomi') }}">10 случайных финских слов</a>
    </li>
</ul>

<ul id="dropdown2" class="dropdown-content">
    <li>
        <a href="{{ url('/russiantrain') }}">Тренировка с русского</a>
    </li>
    <li>
        <a href="{{ url('/randomrussian') }}">10 случайных русских слов</a>
    </li>
</ul>

<ul id="dropdown3" class="dropdown-content">
    <li>
        <a href="{{ url('/word') }}">Мои слова (мой словарь)</a>
    </li>
    <li>
        <a href="{{ url('/addlessons') }}">Добавить урок (слова по тематике)</a>
    </li>
    <li>
        <a href="{{ url('/lessons') }}">Все уроки</a>
    </li>
</ul>

<ul id="dropdown4" class="dropdown-content">
    <li>
        <a href="{{ url('/vocabulary') }}">Словарь</a>
    </li>
    <li>
        <a href="{{ url('/jstest') }}">Поиск и добавление слов в мой словарь (тестовая функция)</a>
    </li>
</ul>








<div class="container">
        @yield('content')
</div>

    <!-- Scripts -->

</body>
</html>
