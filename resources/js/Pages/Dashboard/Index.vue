<template>
    <div>
        <Layout>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4" v-for="(blog,index) in blogs" :key="index">
                            <div class="card mb-4 mt-3">
                            <img :src="blog.avatar" class="card-img-top img-fluid"  alt="Card image cap">
                                <div class="card-body">
                                    <h1 class="text-center">{{blog.title}}</h1>
                                    <a target="_blank" @click="details(blog.id)" class="float-right">Read-More</a>
                                    <a target="_blank" @click="edit(blog.id)" class="float-left">Edit</a>
                                 </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
        </Layout>
    </div>
</template>
<script>
import Layout from "../../Layout/Layout.vue";
export default {
    components:{
        Layout
    },
    data(){
        return{
        blogs:{}

        }
    },
    methods:{
        getBlogs() {
      this.loading = true;
      axios
        .get("/blog/getblogs")
        .then((res) => {
            console.log(res.data)
          if ((res.data.status)) {
            // console.log(res.data.data.data)
            this.blogs = res.data.data.data;
          }
          this.loading = false;
        })
        .catch((err) => {
        //   swal("Error", "Unable to fetch Data", "error");
          this.loading = false;
        });
    },
    details(id){
        this.$inertia.visit('/blog/details/'+id)
    },
    edit(id){
        this.$inertia.visit('/blog/edit/'+id)
    }
    },
    mounted(){
        this.getBlogs()
    }
}
</script>