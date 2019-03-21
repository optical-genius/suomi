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



    <div class="content">
        <div class="row">
            <div class="col-sm">

                <h1 style="padding-top: 40px;">Добавьте урок и привяжите к нему слова по тематике</h1>
            </div>


                <div class="col-sm">

                             <form method="POST" action="/insertlessons">
                                 {{csrf_field()}}
                                 <div class="trainword">
                                     <div class="col-md-3"></div>
                                     <div class="col-md-6">
                                         <input type="text" class="form-control" id="lesson_name" name="lesson_name" placeholder="Название урока / темы" required autofocus>
                                     </div>
                                     <div class="col-md-3"></div>

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
                                                 <td><input type="checkbox" id="id[]" name="words_id[]" value="{{ $word->id }}"></td>
                                             </tr>
                                         @endforeach
                                         </tbody>
                                     </table>
                                     <div class="col-md-4"></div>
                                         <div class="col-md-4">
                                             <button type="submit" class="btn btn-primary mb-2">Добавить</button>
                                         </div>
                                     <div class="col-md-4"></div>

                                 </div>
                             </form>
                </div>

        </div>
    </div>




@endsection