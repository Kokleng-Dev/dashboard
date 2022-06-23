<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/adminlte/index3.html" class="brand-link">
      <img
        src="/adminlte/dist/img/AdminLTELogo.png"
        :alt="$store.state.app.name"
        class="brand-image img-circle elevation-3"
        style="opacity: 0.8"
      />
      <span class="brand-text font-weight-light">{{
        $store.state.app.name
      }}</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../../public/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <div v-for="(menu, index) in menus" :key="index">
            <div v-if="!menu.subItems">
              <NavItem :name="menu.label" :link="menu.link" :icon="menu.icon" :dropdown="false"/>
            </div>
            <div v-if="menu.subItems">
              <NavItem :name="menu.label" :subItems="menu.subItems" :link="menu.link" :icon="menu.icon" :dropdown="true"/>
            </div>
          </div>
          
        </ul>
      </nav>
    </div>
  </aside>
</template>

<script>
import NavItem from "./NavItem.vue";
export default {
  components: {
    NavItem,
  },
  data() {
    return {
        menus: [
            {
                label: "Home",
                icon: "fa fa-home",
                link: "/"
            },
            {
                
                label: "User",
                icon: "fa fa-user",
                subItems: [{
                  
                    label: "About",
                    icon: "fa fa-angle-double-right",
                    link: "/about"
                }, {
                  
                    label: "detail",
                    icon: "fa fa-angle-double-right",
                    link: "/detail"
                }]
            },
        ]
    }
  },
};
</script>

<style>
</style>