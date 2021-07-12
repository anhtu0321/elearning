import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

import dashboard from './components/admin/dashboard/index.vue';

// import component for category
import categorylist from './components/admin/category/list.vue';
import categoryadd from './components/admin/category/add.vue';
import categoryedit from './components/admin/category/edit.vue';

// import component for subcategory
import subcategorylist from './components/admin/subcategory/list.vue';
import subcategoryadd from './components/admin/subcategory/add.vue';
import subcategoryedit from './components/admin/subcategory/edit.vue';

const routes = [
    { path: '/', component: dashboard },

    // start route for category
    { path: '/category', component: categorylist },
    { path: '/add_category', component: categoryadd },
    { path: '/edit_category/:categoryId', component: categoryedit },

    // start route for subcategory
    { path: '/subcategory', component: subcategorylist },
    { path: '/add_subcategory', component: subcategoryadd },
    { path: '/edit_subcategory/:subcategoryId', component: subcategoryedit },
];

const router = new VueRouter({
    routes // viet tat cua routes:routes
});

export default router