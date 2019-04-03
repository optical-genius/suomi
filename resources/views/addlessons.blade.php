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

        <div class="row">
            <div class="col s12">
                <h5 style="padding-top: 40px;">Добавьте урок и привяжите к нему слова по тематике</h5>
            </div>
        </div>


        <div class="row">

                <div class="col s12">

                             <form method="POST" action="/insertlessons">
                                 {{csrf_field()}}


                                     <div class="col s12">
                                         <input type="text" class="form-control" id="lesson_name" name="lesson_name" placeholder="Название урока / темы" required autofocus>
                                     </div>


                                     <?php $table_id = 1; ?>

                                     <table class="table">
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
                                                 <td>{{ $word->word_suomi }}</td>
                                                 <td>{{ $word->word_rus }}</td>
                                                 <td>
                                                 <label>
                                                     <input type="checkbox" id="id[]" name="words_id[]" value="{{ $word->id }}">
                                                     <span></span>
                                                 </label>
                                                 </td>
                                             </tr>
                                         @endforeach
                                         </tbody>
                                     </table>
                                     <div class="col s10"></div>
                                         <div class="col s2">
                                             <button type="submit" class="btn btn-primary mb-2" style="margin-top: 30px; margin-bottom: 30px">Добавить</button>
                                         </div>



                             </form>
                </div>

        </div>





@endsection