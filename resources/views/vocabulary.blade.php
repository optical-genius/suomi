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




<div id="app11">

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
                                                <td>
                                                   <!--
                                                   <a class="modal-trigger" href="#modal1" v-on:click="suomiword1('{{ $vocabulary->word_suomi }}')"></a>
                                                    <i style="vertical-align: bottom;" class="material-icons">record_voice_over</i>
                                                    -->

                                                    {{ $vocabulary->word_suomi }}
                                                </td>
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


      <!-- Modal Trigger -->
    <div id="modal1" class="modal">
        <div class="modal-content">

        </div>
    </div>
            <div class="testframe">
                <input type="button" class="btn modal-trigger" href="#modal1" value="Послушать">

            </div>




</div>
<!--

  <a href="https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&q=peruskoulu&tl=fi" download="peruskoulu.mp3">peruskoulu</a>
        <div id="app">
            <example-component></example-component>

        </div>
        <script src="{!! asset('js/app.js') !!}"></script>

          <script>

                 // Or with jQuery




                 document.querySelector('.testframe').onclick = event => {


                     if (event.target.tagName === 'INPUT') {
                         const frame = event.target.nextElementSibling
                         const link  = frame.dataset.src;

                         frame.setAttribute('src', link);
                         frame.removeAttribute('data-src');
                     }
                 };
             </script>
-->



             <script>

                 $(document).ready(function(){
                     $('.modal').modal();
                 });


                 var app = new Vue({
                     el: '#app11',

                     data: {
                         suomiword: [],
                     },

                     watch: {},

                     methods: {
                         suomiword1: function (message) {
                             $("#modal1").html('<iframe src="https://translate.google.com/translate_tts?ie=UTF-8&q='+message+'%C3%A4&tl=fi&total=1&idx=0&textlen='+message.length+'&tk=364959.198967&client=webapp" frameborder="0" align="left"></iframe>')
                             //alert(message)
                         }
                     },
                 })
             </script>


@endsection