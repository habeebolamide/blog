<template>
  <div class="">
    <Layout>
      <div class="row m-4">
        <div class="col-md-4 m-auto">
          <div class="main-card card">
            <form @submit.prevent="createBlog" ref="form">
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
                  Create Blog
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
  data: () => ({
    form: {
    },
    errors: null,
    loading: false,
    lgas: {},
    states: {},
    lgaloading: false,
    parties: {},
  }),

  methods: {
    createBlog() {
      this.loading = true;
      axios
        .post("/blog/create", this.form)
        .then((res) => {
          this.loading = false;
          toastr.success("Blog Created Successfully");
          this.form = ""
        })
        .catch((err) => {
          this.loading = false;
        });
    },
  },

  mounted() {
  },
};
</script>
  
      <style>
</style>
  