<template>
    <div class="mt-3">
        <div class="col-12 mb-3">
            <Edit v-if="editing" :data="article"></Edit>
            <Show v-else :data="article"></Show>
        </div>
    </div>
</template>

<script>
import Show from './Show';
import Edit from './Edit';
export default {
    components: {
        Show,
        Edit
    },
    data() {
        return {
            article: null,
            editing: false
        }
    },
    created() {
        this.listen()
        this.getArticle()
    },
    methods: {
        listen(){
            EventBus.$on('startEditing', () => {
                this.editing = true
            })

            EventBus.$on('cancelEditing', (articleAfterEdit) => {
                this.editing = false
                this.getArticle()
            })
        },
        getArticle() {
            let app_url = process.env.MIX_APP_URL;
            //console.log(process.env.MIX_APP_URL)
            axios.get(app_url+`/api/articles/${this.$route.params.id}`)
            .then( res => this.article = res.data )
        }
    }
}
</script>