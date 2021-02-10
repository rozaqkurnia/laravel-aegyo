<template>
    <div class="card">    
        <div class="card-body">
            <div class="show-post">
                <h2 class="show-post-title">
                    {{data.title}}
                </h2>
                <p class="show-post-meta">
                    {{data.category.name}}
                    <br>
                    <span v-if="data.status == 'draft'" class="badge bg-secondary text-white">{{data.status}}</span>
                    <span v-if="data.status == 'publish'" class="badge bg-success text-white">{{data.status}}</span>
                </p>
                <p>{{data.description}}</p>
                <hr>
                <p>{{data.content}}</p>
            </div>
        </div>
        <div class="card-footer">
            <button @click="list" class="btn btn-success">Back To Article List</button>
            <button @click="edit" class="btn btn-warning">Edit Article</button>
            <button @click="handleDelete" class="btn btn-outline-danger">Delete Article</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['data'],
    methods: {
        edit(){
            EventBus.$emit('startEditing');
        },
        list(){
            this.$router.push('/dashboard/articles');
        },
        handleDelete(){
            if(confirm("Are you sure want to delete this article? \nThis action cannot be undone.")){
                let app_url = process.env.MIX_APP_URL;
                axios.delete(app_url+`/api/articles/${this.data.id}`)
                .then( res => {
                    this.$router.push('/dashboard/articles');
                })
                .catch( err => {
                    console.log(err)
                });
            }
        }
    }
}
</script>
