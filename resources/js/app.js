require('./bootstrap');

import Vue from 'vue'
import VueRouter from "vue-router"

// window.Vue = require('vue');

Vue.use(VueRouter)

Vue.component('front-page', require('./components/Front.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

import ShowProduct from './components/products/Show'
import IndexProduct from './components/products/Index'


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/main/products',
            name: 'indexProduct',
            component: IndexProduct
        },
        {
            path: '/main/products/:id',
            name: 'showProduct',
            component: ShowProduct,
            props: true
        }
    ]
})

const app = new Vue({
    el: '#app',
    // components: {Front},
    router
});
