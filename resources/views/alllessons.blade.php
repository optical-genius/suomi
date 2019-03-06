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

        <div class="flex-center position-ref full-height">


        <div class="content">
            <h1 style="padding-top: 40px;">Удаление уроков / редактирование уроков</h1>

            <div class="trainword">
                <?php $table_id = 1; ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Уроки которые вы добавили</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($lessons as $lesson)
                                    <tr>
                                        <th scope="row">{{ $table_id++ }}</th>
                                        <td><a href="/lessons/{{ $lesson->id }}">{{ $lesson->name }}</a></td>
                                        <td><a href="/lessons/grammar/{{ $lesson->id }}">Грамматика</a></td>
                                        <td><a href="/deletelessons/{{ $lesson->id }}">Удалить</a></td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>


@endsection