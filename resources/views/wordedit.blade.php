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
@extends('layouts.app')
@section('title')
    Добавление/удаление слов в словарь
@stop


@section('content')



            <div class="row">
                <div class="col s12">
                    <h5 style="padding-top: 40px;">Редактирование слова / Sanan muokkaus</h5>
                </div>
            </div>




            <div class="row">
            <form method="POST" action="/wordupdate">

                {{csrf_field()}}

                @foreach($words as $word)


                    <input type="hidden" name="id[]" id="id" value="{{ $word->id }}">
                    <div class="col s12 m5 l5">
                        <input type="text" name="word_suomi[]"  class="form-control" id="word_suomi" value="{{ $word->word_suomi }}" placeholder="Слово на финском" required>
                    </div>
                    <div class="col s12 m5 l5">
                        <input type="text" name="word_rus[]" class="form-control" id="word_rus" value="{{ $word->word_rus }}" placeholder="Слово на русском" required>
                    </div>
                    <div class="col s12 m2 l2">
                        <button type="submit" class="btn btn-primary mb-2">Обновить</button>
                    </div>


                @endforeach
            </form>
            </div>

@endsection
