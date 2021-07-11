<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sub Category List</h3>
                <div class="text-right">
                    <router-link to="/add_subcategory" class="btn btn-sm btn-success">Add</router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Sub Category Name</th>
                      <th>Category Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(subcategorylist, index) in getSubCategoryList" :key="subcategorylist.id">
                      <td>{{ index +1 }}</td>
                      <td>{{ subcategorylist.sub_cate_name }}</td>
                      <td>{{ subcategorylist.categories.cate_name }}</td>
                      <td>
                        <div class="">
                          <router-link v-bind:to='`/edit_category/${subcategorylist.id}`' class="btn btn-xs btn-info"><i class="fa fa-edit"></i></router-link>
                          <a v-on:click ="categoryDelete(subcategorylist.id)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
	  this.$store.dispatch('getSubCategoryListAc')
  },
  computed:{
	  getSubCategoryList(){
		 return this.$store.getters.subCategoryList
	  }
  },
  methods:{
   
    categoryDelete(id){
      axios.get('/categorydelete/'+id)
      .then((response)=>{
        this.$store.dispatch('getCategoryListAc')
      });
    }
  }
}
</script>

<style>

</style>