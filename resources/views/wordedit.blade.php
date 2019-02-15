<?php
/**
 * Created by PhpStorm.
 * User: Awer
 * Date: 11.02.2019
 * Time: 15:13
 */

?>


<?php
/**
 * Created by PhpStorm.
 * User: Awer
 * Date: 07.02.2019
 * Time: 17:27
 */

?>
        <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('../public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('../public/css/style.css') }}" rel="stylesheet">


</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Главная</a>
            @else
                <a href="{{ route('login') }}">Вход</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </div>
    @endif

    <div class="content">


        <h1>Слова которые я учу/выучил</h1>




        <div class="addword">
            <form method="POST" action="/wordupdate">

                {{csrf_field()}}


                @foreach($words as $word)

                <div class="form-row">
                    <input type="hidden" name="id[]" id="id" value="{{ $word->id }}">
                    <div class="col-md-4">
                        <input type="text" name="word_suomi[]"  class="form-control" id="word_suomi" value="{{ $word->word_suomi }}" placeholder="Слово на финском" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="word_rus[]" class="form-control" id="word_rus" value="{{ $word->word_rus }}" placeholder="Слово на русском" required>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary mb-2">Обновить</button>
                    </div>
                </div>

                @endforeach
            </form>
        </div>

                    <div id="app">
                            <word-component :urldata="{{json_encode($words)}}"></word-component>

                        <span v-bind:title="message">
                            Наведи на меня курсор на пару секунд,
                            чтобы увидеть динамически связанное значение title!
                        </span>
                    </div>
                     <script src="{!! asset('js/app.js') !!}"></script>
    </div>

</div>


</body>



</html>

