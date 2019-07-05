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
    {{ $lessons['name'] }}
@stop

@section('content')

    <script>
        $(document).ready(function () {

            var wrongAnswer = 0;
            var wrightAnswer = 0;

            $(".btn").click(function () {
                var buttonid = $(this).attr('id');

                $("input[id=" + buttonid + "]").each(function (index, value) {
                    var name = $(this).val().toLowerCase();
                    var originalname = $(this).attr('name');
                    var splitoriginalname = originalname.split(', ');
                    if (name == splitoriginalname[0] || name == splitoriginalname[1]) {
                        $(".btn[id=" + buttonid + "]").css({
                            'backgroundColor': '#30d13c',
                            'transition': 'background-color 1000ms linear'
                        }).prop('disabled', true).html("Верно");
                        ++wrightAnswer;
                        $(".wrightAnswer").html("<p>Правильных ответов: <b>" + wrightAnswer + "</b></p>");
                    }
                    else {
                        $(".btn[id=" + buttonid + "]").css({
                            'backgroundColor': '#d13037',
                            'transition': 'background-color 1000ms linear'
                        }).prop('disabled', true).html("Неверно");
                        $(this).val($(this).attr('name'));
                        ++wrongAnswer;
                        $(".wrongAnswer").html("<p>Неправильных ответов: <b>" + wrongAnswer + "</b></p>");
                    }
                });
            });
        });
    </script>


    <div class="row">
        <div class="col s12">
            <h5 style="padding-top: 40px;">Грамматика - название урока ({{$lessons['name']}})</h5>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <?php $table_id = 1; ?>
            <table class="striped">
                <thead>
                <tr>

                </tr>
                </thead>

                <tbody>
                @foreach($words as $word)
                    <form action="" id="{{ $word->id }}">
                        <tr>

                            <ul class="collection" style="margin-bottom: 30px;">
                                <li class="collection-item"><p style="font-size: 1.6em">{{ $word->word_rus }}</p></li>
                                <li class="collection-item"><input type="text" class="formcontrol" id="{{ $word->id }}"
                                                                   name="{{ $word->word_suomi }}"></li>
                                <li class="collection-item">
                                    <button type="button" id="{{ $word->id }}" class="btn btn-small">Проверить</button>
                                </li>
                            </ul>


                        </tr>
                    </form>
                @endforeach
                </tbody>
            </table>
        </div>


        <div class="col s6">
            <div class="wrongAnswer"></div>
        </div>

        <div class="col s6">
            <div class="wrightAnswer"></div>
        </div>
    </div>
@endsection