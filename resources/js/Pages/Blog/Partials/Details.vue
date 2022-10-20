<template>
    <div>
        <h1>{{blog}}</h1>
    </div>
</template>

<script>
export default {
    props:{
        blog:Object
    },
    mounted(){
        console.log(this.blog);
       
    }
}
</script>