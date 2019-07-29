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
   Добавление/удаление слов в словарь
@stop



@section('content')


            <script>
                $(document).ready(function(){
                var f = document.getElementById('form1');
                f.cb_all.onchange = function(e){
                    var el = e.target || e.srcElement;
                    var qwe = el.form.getElementsByClassName('qwe');
                    for(var i = 0; i<qwe.length; i++){
                        if(el.checked){
                            qwe[i].checked = true;
                        }else{
                            qwe[i].checked = false;
                        }
                    }
                }
                });
            </script>


             <div class="row">
                 <div class="col s12">
                    <h5 style="padding-top: 40px;">Добавление/удаление слов в словарь | lisää/poista sanoja</h5>
                 </div>
             </div>



            <div class="row">
                 <form method="POST" action="/wordadd" class="col s12">
                     {{csrf_field()}}

                         <div class="input-field col s12 m5 l5">
                             <input type="text" name="word_suomi[]"  class="form-control" id="word_suomi" placeholder="Слово на финском" required autofocus>
                         </div>

                         <div class="input-field col s12 m5 l5">
                             <input type="text" name="word_rus[]" class="form-control" id="word_rus" placeholder="Слово на русском" required>
                         </div>

                         <div class="input-field col s12 m2 l2">
                             <button type="submit" class="btn btn-primary mb-2">Добавить</button>
                         </div>
                 </form>
            </div>

                 <div class="row">
                     <div class="col s12">
                        <form method="POST" action="/massdelete" id='form1'>
                            {{csrf_field()}}
                             <div class="trainword">

                                <?php $table_id = 1; ?>
                                <table class="striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Suomi sana</th>
                                            <th>Русское слово</th>
                                            <th>Действие</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($words as $word)
                                            <tr>
                                                <th scope="row">{{ $table_id++ }}</th>
                                                <td><a href="/word/edit/{{ $word->id }}">{{ $word->word_suomi }}</a></td>
                                                <td><a href="/word/edit/{{ $word->id }}">{{ $word->word_rus }}</a></td>
                                                <td><a href="worddelete/{{$word->id}}">Удалить</a>

                                                    <label>
                                                        <input type="checkbox" id="id[]" name="{{ $word->id }}" value="{{ $word->id }}" class="qwe">
                                                        <span></span>
                                                    </label>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="row" style="padding-top: 20px">
                                    <div class="col s2 m6 l6"></div>
                                    <div class="col s5 m4 l4">
                                        <button type="submit" class="btn btn-primary mb-2" style="margin-top: 20px">Удалить</button>
                                    </div>
                                    <div class="col s5 m2 l2">
                                        <label>
                                            <input type="checkbox" name="cb_all" >Отметить все
                                            <span></span>
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </form>

                     </div>

                 </div>


@endsection