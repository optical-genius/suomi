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
            <form method="POST" action="/wordupdate" enctype="multipart/form-data">

                {{csrf_field()}}

                @foreach($words as $word)


                    <input type="hidden" name="id[]" id="id" value="{{ $word->id }}">
                    <div class="col s12 m5 l5">
                        <input type="text" name="word_suomi[]"  class="form-control" id="word_suomi" value="{{ $word->word_suomi }}" placeholder="Слово на финском" required>
                    </div>
                    <div class="col s12 m5 l5">
                        <input type="text" name="word_rus[]" class="form-control" id="word_rus" value="{{ $word->word_rus }}" placeholder="Слово на русском" required>
                    </div>

                @if(count($word->img) == NULL)

                    <div class="col s12 m12 l12">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Выберите картинку</span>
                                <input type="file" name="select_file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>

                @elseif(count($word->img)>0)

                        <div class="col s12 m12 l12">
                            <img src="/public/img/word/{{$word->img}}" alt="" style="width: 250px;">
                        </div>

                        <div class="col s12 m12 l12">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Выбрать новую картинку</span>
                                    <input type="file" name="select_file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>

                @endif

                    <div class="col s12 m2 l2">
                        <button type="submit" class="btn btn-primary mb-2">Обновить</button>
                    </div>

                @endforeach
            </form>
            </div>

@endsection
