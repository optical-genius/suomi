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
   Тренировка с финского
@stop


@section('content')






        <div class="row">
            <div class="col s2"></div>
            <div class="col s8">

                <div class="row">
                    <div class="col s12">
                        <h5 style="padding-top: 40px;">Если не знаете ответ - наведите на слово | Jos et tiedä vastausta, siirrä sana</h5>
                    </div>
                </div>

                <?php $table_id = 1; ?>
                    <table class="striped">
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
                                        <td class="learn-word" data-title="{{ $word->word_rus }}">{{ $word->word_suomi }}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            <div class="col s2"></div>
        </div>

@endsection