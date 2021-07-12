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

const storeInfo = {
    state: {
        category: [],
    },
    getters: {
        categoryList() {
            return state.category;
        }
    },
    actions: {
        getCategoryListAc: (context) => {
            Axios.get('/categorylist')
                .then((response) => {
                    context.commit('categoryList', response.data.categoryList);
                })
                .catch((err) => console.log(err))
        }
    },
    mutations: {
        categoryList(state, responseData) {
            state.category = responseData;
        }
    },

}

const store = new VueX.Store({
    storeInfo
});

Vue.component('admin-master', require('./components/admin/adminmaster.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store
});