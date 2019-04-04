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






             <div class="row">
                 <div class="col s1 m2 l2"></div>
                 <div class="col s10 m8 l8">
                     <div class="row">
                         <div class="col s12">
                             <h5 style="padding-top: 40px;">Словарь | sanasto</h5>
                         </div>
                     </div>

                                <table class="striped">
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
                 </div>
                 <div class="col s1 m2 l2"></div>

             </div>

             <div class="row">
                 <div class="col s1 m2 l2"></div>
                 <div class="col s10 m8 l8"> {{ $vocabularies->links() }}</div>
                 <div class="col s1 m2 l2"></div>
             </div>



<!--
        <div id="app">
            <example-component></example-component>

        </div>
        <script src="{!! asset('js/app.js') !!}"></script>
-->

@endsection