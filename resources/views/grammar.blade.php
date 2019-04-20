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

        $( document ).ready(function() {

            $( ".btn" ).click(function() {
                var buttonid = $(this).attr('id');

                $("input[id="+ buttonid +"]").each(function (index, value) {
                    var name = $(this).val().toLowerCase();
                    var originalname = $(this).attr('name');
                    var splitoriginalname = originalname.split(', ');
                    if ( name == splitoriginalname[0] || name == splitoriginalname[1] ) {
                        $( ".btn[id="+ buttonid +"]" ).css( {'backgroundColor' : '#30d13c', 'transition':'background-color 1000ms linear'});
                    }
                    else {
                        $( ".btn[id="+ buttonid +"]" ).css( {'backgroundColor' : '#d13037', 'transition':'background-color 1000ms linear'});
                        $(this).val($(this).attr('name'));

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
                    <th>#</th>
                    <th>Русское слово</th>
                    <th>Ваш ответ</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($words as $word)
                    <form action="" id="{{ $word->id }}">
                        <tr>
                            <th scope="row">{{ $table_id++ }}</th>
                            <td>{{ $word->word_rus }}</td>
                            <td><input type="text" class="formcontrol" id="{{ $word->id }}" name="{{ $word->word_suomi }}"></td>
                            <td><button type="button" id="{{ $word->id }}" class="btn btn-small">Проверить</button></td>
                        </tr>
                    </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>





@endsection



