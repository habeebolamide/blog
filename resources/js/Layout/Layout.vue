<template>
    <div>
        <Appnav/>
            <slot></slot>
        <AppFooter></AppFooter>
    </div>
   
</template>
<script>
import Appnav from "./Navbar.vue";
import AppFooter from "./Footer.vue";

export default {
    components:{
        Appnav,
        AppFooter
    }
}
</script>