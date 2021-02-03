import Vue from 'vue';
import VueRouter from 'vue-router';
import Dashboard from '../components/dashboard/Index';
import Category from '../components/category/Category';
import ArticleList from '../components/article/List';
import ArticleRead from '../components/article/Read';
import ArticleCreate from '../components/article/Create';

Vue.use(VueRouter);

const routes = [
    { path: '/dashboard', component: Dashboard },
    { path: '/dashboard/categories', component: Category },
    { path: '/dashboard/articles', component: ArticleList },
    { path: '/dashboard/articles/create', component: ArticleCreate },
    { path: '/dashboard/articles/:id', component: ArticleRead }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;