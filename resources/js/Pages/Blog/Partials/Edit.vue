<template>
    <div class="">
      <Layout>
        <div class="row m-4">
          <div class="col-md-4 m-auto">
            <div class="main-card card">
              <form @submit.prevent="UpdateBlog" ref="form">
                <div class="card-body">
                  <VueElementLoading
                    :active="loading"
                    spinner="line-scale"
                    color="var(--primary)"
                  />
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Blog Title</span>
                        </div>
                        <input
                          type="text"
                          class="form-control"
                          v-model="form.title"
                          required
                        />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <textarea class="form-control" id="exampleFormControlTextarea1" v-model="form.content" placeholder="Blog Content....." rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-block text-right card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">
                    Edit Blog
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </Layout>
    </div>
  </template>
    
        <script>
  import toastr from "toastr";
  import Layout from "../../../Layout/Layout.vue";
  import VueElementLoading from "vue-element-loading";
  export default {
    components: {
      VueElementLoading,
      Layout,
    },
    props:{
        blog:Object
    },
    data(){
        return{
            form: {
            title: this.blog.title,
            content: this.blog.content,
        },
        errors: null,
        loading: false,
        }
       
    },
  
    methods: {
        UpdateBlog() {
        this.loading = true;
        axios
          .put(
            `/blog/edit/update_blog/${this.blog.id}`,
            this.form
          )
          .then((res) => {
            this.loading = false;
            toastr.success("Blog Updated Successfully");
            this.$inertia.visit('/')
          })
          .catch((err) => {
            this.loading = false;
          });
      },
    },
  
    mounted() {
        console.log(this.blog);
    },
  };
  </script>
    
        <style>
  </style>
    