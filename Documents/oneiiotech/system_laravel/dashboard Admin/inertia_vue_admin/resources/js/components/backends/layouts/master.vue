<template>
    <div class="wrapper">
        <SideBar/>
        <div class="main">
            <NavBar></NavBar>
            <main class="content">
                <div class="container-fluid p-0">
                    <slot></slot>
                </div>
            </main>
            <FooterPage/>
        </div>
    </div>
</template>

<script>
import NavBar from './nav_bar.vue';
import FooterPage from './footer.vue';
import SideBar from './side_bar.vue'
export default {
    components:{
        NavBar, FooterPage , SideBar
    },
}
</script>

<style>

</style>