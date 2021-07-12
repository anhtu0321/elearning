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

// import component for content
import contentlist from './components/admin/content/list.vue';
import contentadd from './components/admin/content/add.vue';
import contentedit from './components/admin/content/edit.vue';

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

    // start route for content
    { path: '/content', component: contentlist },
    { path: '/add_content', component: contentadd },
    { path: '/edit_content/:subcategoryId', component: contentedit },
];

const router = new VueRouter({
    routes // viet tat cua routes:routes
});

export default router