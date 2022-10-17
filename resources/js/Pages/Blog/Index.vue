<template>
    <div>
        <h1>hey</h1>
    </div>
</template>

<script>
export default {
    data:{
        blogs:{}
    },
    methods:{
        getBlogs() {
      this.loading = true;
      axios
        .get("/blogs/getblogs")
        .then((res) => {
            console.log(res.data)
          if ((res.data.status)) {
            // console.log(res.data.data.data)
            this.blogs = res.data.data.data;
          }
          this.loading = false;
        })
        .catch((err) => {
          swal("Error", "Unable to fetch Data", "error");
          this.loading = false;
        });
    },
    },
    mounted(){
        this.getBlogs()
    }
}
</script>