<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">


                        <div class="form-row" v-for="url in urldata">
                            <input type="hidden" v-model="url.id">
                            <div class="col-md-4">
                                <input type="text" v-model="url.word_suomi" placeholder="Слово на финском" required>
                            </div>

                            <div class="col-md-4">
                                <input type="text" v-model="url.word_rus" placeholder="Слово на русском" required>
                            </div>
                            <div class="col-md-4">
                                <button @click="update" class="btn btn-primary mb-2">Обновить</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'urldata'
        ],
        mounted() {
            this.update()
        },
        methods: {
            update: function(){
                axios.get('word/edit/60').then((response) => {
                    this.urldata = response.data
                    });
            }
        }
    }
</script>
