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





                <div class="row">
                    <div class="col s12">
                        <h5 style="padding-top: 40px;">Добавьте урок и привяжите к нему слова по тематике</h5>
                    </div>
                </div>

                <form method="POST" action="/insertlessons" id="frmText">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col s10">
                            <input type="text" class="form-control" id="lesson_name" name="lesson_name" placeholder="Название урока / темы" required autofocus>
                        </div>
                        <div class="col s2">
                            <button type="submit" class="btn btn-primary mb-2" id="btn" disabled="disabled">Добавить</button>
                        </div>
                    </div>

                    <?php $table_id = 1; ?>

                    <div class="row">

                        <div class="col s5 m8 l12">
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
                                        <td>{{ $table_id++ }}</td>
                                        <td>{{ $word->word_suomi }}</td>
                                        <td>{{ $word->word_rus }}</td>
                                        <td>
                                            <label>
                                                <input class="addlessonschekbox" type="checkbox" id="id[]" name="words_id[]" value="{{ $word->id }}">
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>


                    <div class="col s6"></div>
                    <div class="col s2">
                        <button type="submit" class="btn btn-primary mb-2" style="margin-top: 30px; margin-bottom: 30px">Добавить</button>
                    </div>



                </form>






    </div>




    <script>
        $('.addlessonschekbox').click(function(){
            var checked = $("#frmText input:checked").length > 0;
            if (checked){
                $('#btn').removeAttr('disabled');
            } else {
                $('#btn').attr('disabled', 'disabled');
            }
        });
    </script>

@endsection