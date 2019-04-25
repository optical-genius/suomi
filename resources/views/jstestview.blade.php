@extends('layouts.app')
@section('title')
    Поиск и добавление слов из большого словаря
@stop


@section('content')

    <div id="app">
             <div class="row">
                <div class="col s12">
                    <h5 style="margin-top: 50px" @click="tutorialDemoCounter">@{{headerH1}}</h5>
                </div>
             </div>


            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#test1">Словарь</a></li>
                        <li class="tab col s3"><a class="active" href="#test2">Поиск и добавление слов</a></li>
                    </ul>
                </div>



                <div id="test1" class="col s12">Test 1</div>

                <div id="test2" class="col s12">

                    <div class="col s12">
                        <p>Словарь содержит более 4 000 слов. Поиск можно производить как на русском, так и на финском языке. Слова которые вам интересны для изучения
                            можно добавить в ваш личный словарь для дальнейего изучения. Начните вводить слово и отмечайте галочкой нужные вам слова. Затем нажмите кнопку
                            "Добавить в мой словарь"</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group col s12">
                            <div v-if="typeJob == 'search'" class="form-group" style="padding-top: 30px">
                                <input type="text" class="form-control" name="search" v-model="search" placeholder="Какое слово ищем?">
                            </div>
                            <!--
                            <div v-if="typeJob == 'search'" class="form-group">
                                <label>Поиск @{{ search }}</label>
                                <label v-if="search.length"> - кол-во символов @{{ search.length }} </label>
                            </div>
                            -->
                        </div>

                        <div class="form-row">
                            <div class="form-group col s12 m6 l6">
                                <div class="col s12">
                                    <h5 style="margin-top: 30px; margin-bottom: 30px">Отметьте слова, которые хотите добавить к изучению</h5>
                                </div>

                                <div v-if="typeJob == 'search'" class="form-check" v-for="hashtag in hashtags.searchwords">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="filled-in" v-model="checkPick" :value="hashtag">
                                        <span></span>
                                        @{{ hashtag.word_rus }} : @{{ hashtag.word_suomi }}
                                    </label>
                                </div>

                            </div>

                            <!-- Conclusion of words falling into the user dictionary -->

                            <div class="form-group col s12 m6 l6">
                                <div class="col s12">
                                    <h5 style="margin-top: 30px; margin-bottom: 30px">Слова которые будут добавлены в ваш словарь</h5>
                                </div>

                                <div v-if="typeJob == 'search'" class="form-check" v-for="chek, key in checkPick">
                                    <label class="form-check-label">
                                        @{{ ++key }}. @{{ chek.word_rus }} : @{{ chek.word_suomi }}
                                    </label>
                                </div>

                                <button style="margin-top: 30px; margin-bottom: 30px" type="button" class="btn btn-primary" @click="addToUserVocabulary" id="addToUserVocabulary">Добавить в мой словарь
                                        <i id="test111" class="small material-icons" style="display: none; vertical-align: bottom;">beenhere</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>


<script>
    var app = new Vue({

    el: '#app',

    data: {
            message: 'Привет, Vue!',
            wordСounter: 1,
            counter: 0,
            typeJob: 'search',
            headerH1: 'Поиск и добавление слов в пользовательский словарь',
            search: '',
            hashtags: [],
            checkPick: [],
    },

    watch: {
            search: function () {
                this.search.length >= 2 ? this.lookupHashtag() : this.hashtags = [];
            },
    },

    methods: {
            tutorialDemoCounter: function () {
                this.counter++;
            },

            lookupHashtag: function () {
                $.ajax({
                    url: '/searchwords/',
                    dataType: 'json',
                    data: {word_rus : app.search},
                    success: function ( json ) {
                        app.hashtags = json
                    },
                    error: function (data)
                    {
                        console.log('Error:', data.responseText);
                    },
                });
            },

            addToUserVocabulary: function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/addword',
                    type: 'POST',
                    dataType: 'json',
                    data: {data : app.checkPick},
                    success: function (data)
                    {
                        console.log(data);
                        $("#addToUserVocabulary").html('Слова добавлены');

                    },
                    error: function (data)
                    {
                        console.log('Error:', data.responseText);
                        $("#test111").css("display","").fadeIn(500).delay(1000).fadeOut(500);

                    },
                });
            },
    },

    })
</script>


@endsection