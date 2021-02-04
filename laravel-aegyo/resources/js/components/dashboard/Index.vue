<template>
    <div class="mt-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Dashboard</h2>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{total.article}} Articles</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{total.category}} Categories</h3>
                        </div>
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
            total: {
                article: 0,
                category: 0
            }
        }
    },
    created() {
        this.getTotal();
    },
    methods: {
        getTotal() {
            let appUrl = process.env.MIX_APP_URL;
            axios.get(appUrl+'/api/dashboard')
            .then(res => {
                this.total.article = res.data.total.article
                this.total.category = res.data.total.category
            });
        }
    }
}
</script>