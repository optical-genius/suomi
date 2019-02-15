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


            <form method="POST" action="/massdelete">
                {{csrf_field()}}
            <div class="trainword">
                <?php $table_id = 1; ?>







                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Suomi sana</th>
                            <th>Русское слово</th>
                            <th>Действие</th>
                        </tr>
                        </thead>



                        <tbody>







                @foreach($words as $word)

                    <tr>
                        <th scope="row">{{ $table_id++ }}</th>
                        <td><a href="/word/edit/{{ $word->id }}">{{ $word->word_suomi }}</a></td>
                        <td><a href="/word/edit/{{ $word->id }}">{{ $word->word_rus }}</a></td>
                        <td><a href="worddelete/{{$word->id}}">del     </a><input type="checkbox" id="id[]" name="{{ $word->id }}" value="{{ $word->id }}"></td>

                    </tr>


                @endforeach

                        </tbody>
                    </table>


                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-2"> <button type="submit" class="btn btn-primary mb-2">Удалить</button></div>
                        <div class="col-md-2"></div>
                    </div>
            </div>

            </form>


            <div class="addword">
            <form method="POST" action="/wordadd">

                {{csrf_field()}}

                <div class="form-row">
                    <div class="col-md-4">
                        <input type="text" name="word_suomi[]"  class="form-control" id="word_suomi" placeholder="Слово на финском" required autofocus>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="word_rus[]" class="form-control" id="word_rus" placeholder="Слово на русском" required>
                    </div>
                    <div class="col-md-4">
                    <button type="submit" class="btn btn-primary mb-2">Добавить</button>
                    </div>
                </div>
            </form>
            </div>

        </div>

        </div>



        <div id="app">
            <example-component></example-component>

        </div>
        <script src="{!! asset('js/app.js') !!}"></script>


</body>



</html>
