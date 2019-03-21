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
    10 случайных финских слов
@stop


@section('content')



    <div class="content">
        <div class="row">
            <div class="col-sm">
                <h1 style="padding-top: 40px;">10 satunnaisia ​​sanoja</h1>
            </div>
            <div class="col-sm">
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
                                            <td class="learn-word" data-title="{{ $word->word_rus }}">{{ $word->word_suomi }}</td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="/randomsuomi"><button type="submit" class="btn btn-primary mb-2">Lisää sanoja ...</button></a>
                </div>
            </div>
        </div>


@endsection