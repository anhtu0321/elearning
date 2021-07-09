<template>
<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new Category </h3>
              </div>
              <form role="form" v-on:submit.prevent="categorySave">
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
            cate_name:''
        }
    },
    methods:{
        categorySave(){
          let data = new FormData;
          data.append('cate_name', this.cate_name);
          axios.post('/categorysave', data)
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
    }
}
</script>

<style>

</style>