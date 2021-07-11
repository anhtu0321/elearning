// import Axios from "axios"
import Vue from "vue";
import Vuex from "vuex";
Vue.use(Vuex);

const storeInfo = {
    state: {
        category: [],
        subcategory: [],
    },
    getters: {
        categoryList(state) {
            return state.category;
        },
        subCategoryList(state) {
            return state.subcategory;
        }
    },
    actions: {
        getCategoryListAc: (context) => {
            axios.get('/categorylist')
                .then((response) => {
                    context.commit('categoryList', response.data);
                })
                .catch((err) => console.log(err))
        },
        getSubCategoryListAc: (context) => {
            axios.get('/subcategorylist')
                .then((response) => {
                    context.commit('subCategoryList', response.data);
                })
                .catch((err) => console.log(err))
        }
    },
    mutations: {
        categoryList(state, responseData) {
            state.category = responseData;
        },
        subCategoryList(state, responseData) {
            state.subcategory = responseData;
        }
    },
}
const store = new Vuex.Store(
    storeInfo
)


export default store