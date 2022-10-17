<template>
    <div>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"></link>
    </head>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/blog/">Create Blog</a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="" @click="logout">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
</template>
<script>
export default {
  methods: {
    logout() {
      axios
        .post("/logout")
        .then((res) => {
          window.location.href = "/";
        })
        .catch((error) => {
          window.location.href = "/login";
        });
    },
    success() {
      toastr.success("Signature uploaded");
    },
  },
};
</script>
<style>
a:hover {
  cursor: pointer !important;
}
</style>