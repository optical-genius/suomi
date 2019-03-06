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
    Тренировка с русского
@stop


@section('content')

        <div class="flex-center position-ref full-height">


        <div class="content">
            <h1 style="padding-top: 40px;">Если не знаете ответ - наведите на слово |<br/> Jos et tiedä vastausta, siirrä sana</h1>

            <div class="trainword">
                <?php $table_id = 1; ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Suomi sana</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($words as $word)
                                    <tr>
                                        <th scope="row">{{ $table_id++ }}</th>
                                        <td class="learn-word" data-title="{{ $word->word_suomi }}">{{ $word->word_rus }}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>

@endsection