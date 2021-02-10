<template>
    <div class="mt-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Add New Article</h2>
        </div>

        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-body">
                <form @submit.prevent="handleSubmit">
                    <div class="form-group">
                        <div class="col-3">
                            <label for="title">Title</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" for="title" v-model="form.title">
                            <span class="text-danger" v-if="errors.title">{{ errors.title[0] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-3">
                            <label for="category_id">Category</label>
                        </div>
                        <div class="col-12">
                            <select v-model="form.category_id" name="category_id" class="form-control">
                                <option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
                            </select>
                            <span class="text-danger" v-if="errors.category_id">{{ errors.category_id[0] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-3">
                            <label for="description">Description</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" v-model="form.description">
                            <span class="text-danger" v-if="errors.description">{{ errors.description[0] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="publish" v-model="form.publish" value="0" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Draft
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="publish" v-model="form.publish" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Publish
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-3">
                            <label for="content">Content</label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" name="content" id="" cols="30" rows="10" v-model="form.content"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-9">
                            <input type="submit" class="btn btn-info" value="Add New Article">
                            <input type="button" @click="cancel" class="btn btn-secondary" value="Cancel">
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                title: null,
                category_id: null,
                description: null,
                content: null,
                publish: 0
            },
            categories: {},
            errors: {}
        }
    },
    created() {
        axios.get('/api/categories')
        .then(res => this.categories = res.data)
    },
    computed: {
        disabled() {
            return false;
        }
    },
    methods: {
        handleSubmit() {
            axios.post('/api/articles', this.form)
            .then( res => {
                this.reset();
                this.$router.push('/dashboard/articles');
            })
            .catch( err => {
                this.errors = err.response.data.errors;
            });
        },
        cancel() {
            this.reset()
            this.$router.push('/dashboard/articles');
        },
        reset() {
            this.form.title = null;
            this.form.category_id = null;
            this.form.description = null;
            this.form.content = null;
            this.form.publish = 0;
            this.errors = null;
        }
    }
}
</script>