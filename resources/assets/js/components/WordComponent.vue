<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактирование слова</div>

                    <div class="panel-body">

                        <form action="/wordupdateajax" method="POST" @submit.prevent = "addTask()">

                        <div class="form-row" v-for="url in urldata">
                            <input type="hidden" v-model="id" >
                            <div class="col-md-4">
                                <input type="text" v-model="word_suomi" :placeholder="url.word_suomi" required>

                            </div>
                            <div class="col-md-4">
                                <input type="text" v-model="word_rus" :placeholder="url.word_rus" required>

                            </div>
                            <div class="col-md-4">
                                <button type="submit" value="Add Word" class="btn btn-primary mb-2">Обновить</button>
                            </div>
                        </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


    export default {
        data(){
          return{
              word_rus: '',
              word_suomi: '',
          }
        },
        props: [
            'urldata',
        ],
        mounted() {
            console.log('mounted')
        },
        methods: {
            addTask() {
                axios({
                    method: 'post',
                    url: '/wordupdateajax',
                    data: {
                        id: id['value'],
                        word_rus: this.word_rus,
                        word_suomi: this.word_suomi
                    }

                });

                alert('Слово обновлено');

            }
            }
        }

</script>
