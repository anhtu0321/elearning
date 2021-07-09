require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter);

import { routes } from './routes';

const router = new VueRouter({
    routes // viet tat cua routes:routes
});

import VueX from 'vuex'
Vue.use(VueX);

import storeInfo from './store/store'
const store = new VueX.Store({
    storeInfo
});

Vue.component('admin-master', require('./components/admin/adminmaster.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store
});