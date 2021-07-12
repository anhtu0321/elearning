<template>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add new Category</h3>
                </div>
                <form role="form" v-on:submit.prevent="categorySave">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7 right-border">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <select class="form-control">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category Sub Name</label>
                                            <select class="form-control">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Content title</label>
                                            <input type="text" class="form-control" v-model="cate_name" placeholder="Enter Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <ckeditor v-model="editorData" :config="editorConfig"></ckeditor>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Upload File</label>
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Video Url</label>
                                            <input type="text" class="form-control" v-model="cate_name" placeholder="Enter Category">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="submit" class="btn btn-danger" v-on:click="goback">Back</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import CKEditor from 'ckeditor4-vue';
export default {
    components: {
        // Use the <ckeditor> component in this view.
        ckeditor: CKEditor.component
    },
    data(){
        return {
            cate_name:'',
            editorData: '<p>Content of the editor.</p>',
            editorConfig: {
                // The configuration of the editor.
            }
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
          this.$router.push('/content');
        },
        
    },
    mounted(){
    }
}
</script>

<style>
.right-border{
    border-right:1px solid #f0efef;
}
</style>