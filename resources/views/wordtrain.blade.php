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
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
@endif

        <div class="content">


            <h1>Слова которые я учу/выучил</h1>



            <div class="trainword">
                <?php $table_id = 1; ?>

                @foreach($words as $word)

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-1">{{ $table_id++ }}</div>
                        <div class="col-md-1">{{ $word->word_suomi }}</div>
                        <div class="col-md-1">{{ $word->word_rus }}</div>
                        <div class="col-md-5"></div>
                    </div>

                @endforeach
            </div>



            <div class="addword">
            <form method="POST" action="/wordadd">

                {{csrf_field()}}

                <div class="form-row">
                    <div class="col-md-4">
                        <input type="text" name="word_suomi[]"  class="form-control" id="word_suomi" placeholder="Слово на финском">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="word_rus[]" class="form-control" id="word_rus" placeholder="Слово на русском">
                    </div>
                    <div class="col-md-4">
                    <button type="submit" class="btn btn-primary mb-2">Добавить</button>
                    </div>
                </div>
            </form>
            </div>


        </div>

        </div>


</body>



</html>
