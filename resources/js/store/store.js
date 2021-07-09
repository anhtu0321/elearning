import Axios from "axios"

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
export default storeInfo