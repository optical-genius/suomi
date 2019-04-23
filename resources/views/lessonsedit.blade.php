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

<div id="app">
    <div class="row">
            <div class="col s12">
                <h5 style="padding-top: 40px;">Удалить слова из урока - {{ $lessons['name'] }}</h5>
            </div>
    </div>



    <div class="row">
        <div class="col m1 l1"></div>
            <div class="col s8 m10 l10">
                    <?php $table_id = 1; ?>
                        <table class="striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Suomi sana</th>
                                    <th>Русское слово</th>
                                    <th>Действие</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($words as $word)
                                        <tr>
                                            <th scope="row">{{ $table_id++ }}</th>
                                            <td>{{ $word->word_suomi }}</td>
                                            <td>{{ $word->word_rus }}</td>
                                            <td>

                                            </td>
                                            <td>
                                                <label>
                                                    <input type="checkbox" id="id[]" name="{{ $word->id }}" value="{{ $word->id }}" class="qwe" v-model="checkPick">
                                                    <span></span>
                                                </label>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        <div class="col m1 l1"></div>
    </div>
    <div class="row">
        <div class="col s6 m8 l8"></div>
        <div class="col s2 m4 l4">
            <button @click="deleteWordFromVocabulary" type="button" class="btn btn-primary" value="{{ $lessons->id }}" v-bind:value="idLessons" id="deletewords">Удалить выбранные</button>
        </div>
    </div>



    <div class="row">
        <div class="col s12">
            <h5 style="padding-top: 40px;">Добавить к уроку новые слова</h5>
        </div>
        <div class="col s12">
            <p>Эти слова есть в вашем словаре, но вы не добавляли их к уроку.</p>
        </div>
    </div>


    <div class="row">
        <div class="col m1 l1"></div>
        <div class="col s8 m10 l10">
            <?php $table_id = 1; ?>
            <table class="striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Suomi sana</th>
                    <th>Русское слово</th>
                    <th>Действие</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($new_words as $new_word)
                    <tr>
                        <th scope="row">{{ $table_id++ }}</th>
                        <td>{{ $new_word->word_suomi }}</td>
                        <td>{{ $new_word->word_rus }}</td>
                        <td><a href="/add-word-in-vocabulary/{{ $lessons->id }}/{{ $new_word->id }}">Добавить</a></td>
                        <td>
                            <label>
                                <input type="checkbox" id="id[]" name="{{ $new_word->id }}" value="{{ $new_word->id }}" v-model="checkPickAdd">
                                <span></span>
                            </label>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



</div>
    <div class="row">
        <div class="col s6 m8 l8"></div>
        <div class="col s2 m4 l4">
            <button @click="addWordFromVocabulary" type="button" class="btn btn-primary" value="{{ $lessons->id }}" v-bind:value="idLessons" id="addwords">Добавить выбранные</button>
        </div>
    </div>
</div>



<script>
    var app = new Vue({

        el: '#app',

        data: {
            idLessons: '{{ $lessons->id }}',
            checkPick: [],
            checkPickAdd: [],
        },

        watch: {

        },

        methods: {
            deleteWordFromVocabulary: function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/deleteword',
                    type: 'POST',
                    dataType: 'json',
                    data: {data : app.checkPick, id : app.idLessons},
                    success: function (data)
                    {
                        $("#deletewords").html('Успешно');
                        location.reload();
                    },
                    error: function (data)
                    {
                        console.log('Error:', data.responseText);
                    },
                });
            },



            addWordFromVocabulary: function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/add-word-to-lesson',
                    type: 'POST',
                    dataType: 'json',
                    data: {data : app.checkPickAdd, id : app.idLessons},
                    success: function (data)
                    {
                        $("#addwords").html('Успешно');
                        location.reload();
                    },
                    error: function (data)
                    {
                        console.log('Error:', data.responseText);
                    },
                });
            },

        },

    })
</script>

@endsection