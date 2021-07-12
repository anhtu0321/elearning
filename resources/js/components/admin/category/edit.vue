<template>
<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Category</h3>
              </div>
              <form role="form" v-on:submit.prevent="categoryUpdate">
                <div class="card-body">
                  <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" v-model="cate_name" placeholder="Enter Category">
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
            cate_name:'',
        }
    },
    methods:{
        categoryUpdate(){
          let data = new FormData;
          data.append('cate_name', this.cate_name);
          axios.post(`/elearning/public/categoryupdate/${this.$route.params.categoryId}`, data)
          .then(response => {
              this.goback();
          })
          .catch((error) => {
              console.error('Error:', error);
          });
        },
        goback(){
          this.$router.push('/category');
        }
    },
    mounted(){
        axios.get(`/elearning/public/categorybyid/${this.$route.params.categoryId}`)
        .then((response)=>{
            this.cate_name = response.data.cate_name;
        })
      
    }
}
</script>

<style>

</style>