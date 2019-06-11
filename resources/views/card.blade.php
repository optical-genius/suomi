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

    <div class="row">
        <div class="col s12">
            <h5 style="padding-top: 40px;">Грамматика - название урока ({{$lessons['name']}})</h5>
        </div>
    </div>


    <div class="carousel">
        @foreach($words as $word)
        <a class="carousel-item" href="#one!" style="width: 280px; height: 100%;">


            <div class="col s12 m6 offset-m3">

                    <div class="card">
                        <div class="card-image">
                            @if(is_null($word->img))
                                <img src="/img/empty-image.jpg">
                            @else
                                <img src="/img/word/{{$word->img}}">
                            @endif

                            <span class="card-title" style="font-size: 2em; font-weight: 600; background: #00ffffd9;">{{ $word->word_suomi }}</span>
                        </div>
                        <div class="card-content">
                            <p>{{ $word->word_rus }}</p>
                        </div>

                    </div>

            </div>
        </a>
        @endforeach
    </div>







@endsection
