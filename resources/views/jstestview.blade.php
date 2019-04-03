<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>



<body>
    <div class="container">
        <div id="app">
            <h2 @click="tutorialDemoCounter">@{{headerH1}}</h2>
            <br>

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">

                    <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">Словарь</a>

                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false">Поиск и добавление слов для изучения</a>

                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            фывфывфыв
                </div>



                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="form-row">
                        <div class="form-group col-md-12">


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
                            <div class="form-group col-md-6">
                                <div class="col-sm-12">
                                    <h5 style="height: 70px">Отметьте слова, которые хотите добавить к изучению</h5>
                                </div>
                                <div class="jumbotron">
                                    <div v-if="typeJob == 'search'" class="form-check" v-for="hashtag in hashtags.searchwords">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" v-model="checkPick" :value="hashtag">
                                            @{{ hashtag.word_rus }} : @{{ hashtag.word_suomi }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Conclusion of words falling into the user dictionary -->

                            <div class="form-group col-md-6">
                                <div class="col-sm-12">
                                    <h5 style="height: 70px">Слова которые будут добавлены в ваш словарь</h5>
                                </div>
                                <div class="jumbotron">
                                    <div v-if="typeJob == 'search'" class="form-check" v-for="chek, key in checkPick" v-model="tutorialDemoCounter">
                                        <label class="form-check-label">
                                           @{{ ++key }}. @{{ chek.word_rus }} : @{{ chek.word_suomi }}
                                        </label>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" @click="addToUserVocabulary">Добавить в мой словарь</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
                    url: 'http://suomi.ru/searchwords/',
                    dataType: 'json',
                    data: {word_rus : app.search},
                    success: function ( json ) {
                        app.hashtags = json
                    }
                });
            },

            addToUserVocabulary: function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: 'http://suomi.ru/addword',
                    type: 'GET',
                    dataType: 'json',
                    data: {data : app.checkPick},
                    success: function (data)
                    {
                        console.log(data);

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
</html>