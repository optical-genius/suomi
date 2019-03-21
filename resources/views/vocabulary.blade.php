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
   Словарь
@stop


@section('content')




         <div class="content">
             <div class="row">
                 <div class="col-sm">
                <h1 style="padding-top: 40px;">Словарь | sanasto</h1>
                 </div>
             </div>



                 <div class="row">
                     <div class="col-sm">

            <form method="POST" action="/massdelete">
                {{csrf_field()}}
                 <div class="trainword">


                    <table class="table">
                        <thead>
                            <tr>

                                <th>Suomi sana</th>
                                <th>Русское слово</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($vocabularies as $vocabulary)
                                <tr>

                                    <td>{{ $vocabulary->word_suomi }}</td>
                                    <td>{{ $vocabulary->word_rus }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8"> {{ $vocabularies->links() }}</div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </form>

                     </div>
                     </div>
        </div>




<!--
        <div id="app">
            <example-component></example-component>

        </div>
        <script src="{!! asset('js/app.js') !!}"></script>
-->

@endsection