require('./bootstrap');

window.Vue = require('vue');

import router from './routes';
import store from './store/store'

Vue.component('admin-master', require('./components/admin/adminmaster.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store
});