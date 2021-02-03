import Vue from 'vue';
import VueRouter from 'vue-router';
import Category from '../components/category/Category';

Vue.use(VueRouter);

const routes = [
    { path: '/dashboard', component: Category },
    { path: '/dashboard/categories', component: Category },
    { path: '/dashboard/articles', component: Category },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;