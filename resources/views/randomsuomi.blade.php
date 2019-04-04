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

    <div class="row">
        <div class="col s1 m2 l2"></div>
        <div class="col s10 m8 l8">

            <div class="row">
                <div class="col s12">
                    <h5 style="padding-top: 40px;">10 случайных финских слов</h5>
                </div>
            </div>

            <?php $table_id = 1; ?>
            <table class="striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Слово на русском</th>
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
            <a href="/randomsuomi"><button type="submit" class="btn btn-primary mb-2" style="margin-top: 30px; margin-bottom: 30px">Еще слова...</button></a>

        </div>
        <div class="col s1 m2 l2"></div>
    </div>


@endsection