require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
Vue.component('pagination', require('laravel-vue-pagination'));

import ShowProduct from './components/products/Show';
import IndexProduct from './components/products/Index';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/main/products',
            name: 'indexProduct',
            component: IndexProduct,
            props: true,
        },
        {
            path: '/main/products/:id',
            name: 'showProduct',
            component: ShowProduct,
            props: true,
        },
    ],
});

const app = new Vue({
    el: '#app',
    router,
});
