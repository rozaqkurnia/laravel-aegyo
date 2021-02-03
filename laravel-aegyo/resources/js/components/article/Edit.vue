<template>
    <div class="card">
        <div class="card-body">
        <form @submit.prevent="handleUpdate">
            <div class="form-group">
                <div class="col-3">
                    <label for="title">Title</label>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control" for="title" v-model="form.title">
                    <span class="text-danger" v-if="errors">error validation</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-3">
                    <label for="category_id">Category</label>
                </div>
                <div class="col-12">
                    <select v-model="form.category_id" name="category_id" class="form-control">
                        <option 
                            v-for="category in categories" 
                            :selected="category.id == form.category_id"
                            :key="category.id" 
                            :value="category.id"
                        >{{category.name}}</option>
                    </select>
                    <span class="text-danger" v-if="errors">error validation</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-3">
                    <label for="description">Description</label>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control" v-model="form.description">
                    <span class="text-danger" v-if="errors">error validation</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-3">
                    <label for="content">Content</label>
                </div>
                <div class="col-12">
                    <textarea class="form-control" name="content" id="" cols="30" rows="10" v-model="form.content"></textarea>
                    <span class="text-danger" v-if="errors">error validation</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-9">
                    <input type="submit" class="btn btn-info" value="Update Article">
                </div>
            </div>
        </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['data'],
    data() {
        return {
            form: {
                title: null,
                category_id: null,
                description: null,
                content: null
            },
            categories: {},
            errors: null
        }
    },
    mounted() {
        this.form.title = this.data.title;
        this.form.category_id = this.data.category.id;
        this.form.description = this.data.description;
        this.form.content = this.data.content;
        this.getCategories();
    },
    methods: {
        getCategories(){
            //console.log(this.form.category_id);
            let app_url = process.env.MIX_APP_URL;
            axios.get(app_url+`/api/categories`)
            .then( res => {
                this.categories = res.data
            })
        },
        handleUpdate(){
            let app_url = process.env.MIX_APP_URL;
            axios.patch(app_url+`/api/articles/${this.data.id}`, this.form)
            .then( res => {
                this.cancel()
            })
        },
        cancel(){
            EventBus.$emit('cancelEditing')
        }
    }
}
</script>