<template>
    <div class="mt-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Categories</h2>
        </div>

        <div class="col-6 mb-3">
            <div class="card">
                <div class="card-body">
                <h4>Add New Category</h4>
                <form @submit.prevent="handleSubmit">
                    <div class="form-group">
                        <div class="col-3">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" for="name" v-model="form.name">
                            <span class="text-danger" v-if="errors">error validation</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-9">
                            <input type="submit" class="btn btn-info" v-if="!categoryToEdit" value="Add New Category">
                            <input type="submit" class="btn btn-warning" v-else value="Update Category">
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(category,index) in categories" :key="category.id">
                                <td style="width:10%">{{index+1}}</td>
                                <td style="width:60%">{{category.name}}</td>
                                <td style="width:30%">
                                    <button class="btn btn-outline-warning btn-sm" @click="edit(category.id, index)">Edit</button>
                                    <button class="btn btn-outline-danger btn-sm" @click="handleDelete(category.id, index)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
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
                name: null
            },
            categories: {},
            errors: null,
            categoryToEdit: null
        }
    },
    created() {
        axios.get('/api/categories')
        .then( res => {
            this.categories = res.data
            //console.log(res.data)
        })
        .catch( err => this.errors = err.response.data.errors )
    },
    methods: {
        handleSubmit() {
            this.categoryToEdit ? this.handleUpdate() : this.handleCreate();
        },
        handleCreate() {
            axios.post('/api/categories', this.form)
            .then( res => {
                this.categories.push(res.data)
                this.form.name = null
            });
        },
        handleUpdate() {
            axios.patch(`/api/categories/${this.categoryToEdit}`, this.form)
            .then( res => {
                this.categories.push(res.data)
                this.form.name = null
                this.categoryToEdit = null
            })
        },
        edit(categoryId, index) {
            this.form.name = this.categories[index].name;
            this.categoryToEdit = categoryId;
            this.categories.splice(index,1);
        },
        handleDelete(categoryId, index) {
            axios.delete(`/api/categories/${categoryId}`)
            .then(res => this.categories.splice(index, 1));
        }
    }
}
</script>