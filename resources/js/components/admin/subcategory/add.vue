<template>
<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new Sub Category</h3>
              </div>
              <form role="form" v-on:submit.prevent="subCategorySave">
                <div class="card-body">
                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" v-model="cate_id">
                            <option :value="category.id" 
                                v-for="category in getCategoryList"
                                :key="category.id"
                            >
                                {{category.cate_name}}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sub Category Name</label>
                        <input type="text" class="form-control" v-model="sub_cate_name" placeholder="Enter Category">
                    </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="submit" class="btn btn-danger" v-on:click="goback">Back</button>
                </div>
              </form>
            </div>
          </div>
        </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            sub_cate_name:'',
            cate_id:''
        }
    },
    mounted(){
        this.$store.dispatch('getCategoryListAc')
    },
    computed:{
        getCategoryList(){
            return this.$store.getters.categoryList
        }
    },

    methods:{
        subCategorySave(){
          let data = new FormData;
          data.append('sub_cate_name', this.sub_cate_name);
          data.append('cate_id', this.cate_id);
          axios.post('/elearning/public/subcategorysave', data)
          .then(response => {
              this.goback();
          })
          .catch((error) => {
              console.error('Error:', error);
          });
        },
        goback(){
          this.$router.push('/subcategory');
        }
    },
}
</script>

<style>

</style>