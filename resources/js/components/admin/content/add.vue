<template>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add new Category</h3>
                </div>
                <form role="form" v-on:submit.prevent="contentSave" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7 right-border">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <select class="form-control" v-model="category_id" @change="getSubCategory">
                                                <option :value="category.id" v-for="category in getCategoryList" :key="category.id">{{ category.cate_name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category Sub Name</label>
                                            <select class="form-control" v-model="subCategory_id">
                                                <option :value="sub_cate.id" v-for="sub_cate in subCategory" :key="sub_cate.id">{{ sub_cate.sub_cate_name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Content title</label>
                                            <input type="text" class="form-control" v-model="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <ckeditor v-model="description" :config="editorConfig"></ckeditor>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Upload File</label>
                                            <input type="file" class="form-control" @change="getFile">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Video Url</label>
                                            <input type="text" class="form-control" v-model="video_url" placeholder="Enter Category">
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
            subCategory:[],
            category_id:'',
            subCategory_id:'',
            
            title:'',
            file:'',
            video_url:'',
            
            description: '<p>Content of the editor.</p>',
            editorConfig: {
                // The configuration of the editor.
               // Toolbar configuration generated automatically by the editor based on config.toolbarGroups.
                toolbar: [
                    [ 'Source', '-', 'Save', 'NewPage', 'ExportPdf', 'Preview', 'Print', '-', 'Templates' ],
                    [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
                    [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ],
                    [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ],
                    '/',
                    [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ],
                    [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ],
                    [ 'Link', 'Unlink', 'Anchor' ],
                    [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ],
                    '/',
                    [ 'Styles', 'Format', 'Font', 'FontSize' ],
                    [ 'TextColor', 'BGColor' ],
                    [ 'Maximize', 'ShowBlocks' ],
                    [ '-' ] ,
                    [ 'About' ]
                ],
            }
        }
    },
    methods:{
        getSubCategory(){
            axios.get('/elearning/public/getsubcategorybycategoryid/'+this.category_id)
            .then((response)=>{
                this.subCategory = response.data;
            })
        },
        getFile(e){
            this.file = e.target.files[0];
        },
        contentSave(){
          let data = new FormData;
          data.append('category_id', this.category_id);
          data.append('subCategory_id', this.subCategory_id);
          data.append('title', this.title);
          data.append('file', this.file);
          data.append('video_url', this.video_url);
          data.append('description', this.description);

          axios.post('/elearning/public/contentsave', data)
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
        this.$store.dispatch('getCategoryListAc')
    },
    computed:{
        getCategoryList(){
            return this.$store.getters.categoryList
        }
    },
}
</script>

<style>
.right-border{
    border-right:1px solid #f0efef;
}
</style>