<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category List</h3>
                <div class="text-right">
                    <router-link to="/add_category" class="btn btn-sm btn-success">Add</router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Category Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(categorylist, index) in getCategoryList" :key="categorylist.id">
                      <td>{{ index }}</td>
                      <td>{{ categorylist.cate_name }}</td>
                      <td>
                        <div class="">
                          <router-link v-bind:to='`/edit_category/${categorylist.id}`' class="btn btn-xs btn-info"><i class="fa fa-edit"></i></router-link>
                          <a v-on:click ="categoryDelete(categorylist.id)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
export default {
  data(){
    return{

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
   
    categoryDelete(id){
      axios.get('/elearning/public/categorydelete/'+id)
      .then((response)=>{
        this.$store.dispatch('getCategoryListAc')
      });
    }
  }
}
</script>

<style>

</style>