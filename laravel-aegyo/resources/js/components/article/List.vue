<template>
    <div class="mt-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Articles</h2>
        </div>

        <div class="col-6 mb-3">
            <router-link to="/dashboard/articles/create" class="btn btn-info">Add New Article</router-link>
        </div>
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(article,index) in articles" :key="article.id">
                                <td style="width:10%">{{index+1}}</td>
                                <td>{{article.title}}</td>
                                <td>{{article.category.name}}</td>
                                <td>{{article.description}}</td>
                                <td style="width:30%">
                                    <router-link class="btn btn-outline-secondary btn-sm" :to="`/dashboard/articles/${article.id}`">View Details</router-link>
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
            articles: {},
            errors: null,
        }
    },
    created() {
        axios.get('/api/articles')
        .then( res => {
            this.articles = res.data
            //console.log(res.data)
        })
        .catch( err => this.errors = err.response.data.errors )
    }
}
</script>