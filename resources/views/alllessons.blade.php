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
   Все уроки
@stop


@section('content')





   <div class="row">

       <div class="col s12">
           <h5 style="padding-top: 40px;">Добавьте урок и привяжите к нему слова по тематике</h5>
       </div>

        <div class="col s12">


                                <?php $table_id = 1; ?>

                                <table class="striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Уроки которые вы добавили</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($lessons as $lesson)
                                                <tr>
                                                    <th scope="row">{{ $table_id++ }}</th>
                                                    <td><a href="/lessons/{{ $lesson->id }}">{{ $lesson->name }}</a></td>
                                                    <td><a href="/lessons/grammar/{{ $lesson->id }}">Грамматика</a></td>
                                                    <td><a href="/lessons/edit/{{ $lesson->id }}">Редактировать</a></td>
                                                    <td><a href="/deletelessons/{{ $lesson->id }}">Удалить</a></td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
            </div>

    </div>



@endsection