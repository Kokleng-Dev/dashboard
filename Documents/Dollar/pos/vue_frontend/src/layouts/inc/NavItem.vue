<template>
  <li class="nav-item" v-if="!dropdown">
    <router-link class="nav-link " :to="`${link}`" :class="{ active : isActive() }" >
      <i :class="`nav-icon ${icon} mr-2 pl-1`" v-if="icon"></i>
      <p> {{ name }} </p>
    </router-link>
  </li>
  <li class="nav-item" v-if="dropdown">
      <a href="#" class="nav-link">
          <i :class="`nav-icon active ${icon} pl-1`" v-if="icon"></i> &nbsp;
          <p>
              {{ name }}
              <i class="right fas fa-angle-left"></i>
          </p>
      </a>
      <ul class="nav nav-treeview">
          <li class="nav-item" v-for="(sub, index) in subItems" :key="index">
              <router-link :id="`${sub.label}`" :to="`${sub.link}`" class="nav-link">
                  <i :class="`nav-icon ${sub.icon} pl-1`" v-if="sub.icon"></i>
                  <p>{{sub.label}}</p>
              </router-link>
          </li>
      </ul>
  </li>
</template>

<script>
export default {
  props: {
    icon: {
      type: String,
      default: null,
    },
    link: {
      type: [String, Object],
      default: null,
    },
    name: {
      type: [String, Object],
      default: null,
    },
    subItems: {
      type: [String, Object],
      default: null,
    },
    dropdown: {
      type: [Boolean, Object],
      default: false,
    },
  },
  data(){
    return {
      
    }
  },
  mounted() {},
  methods: {
    isActive() {
      if (typeof this.link === "object") {
        return this.$route.name === this.link.name;
      } else {
        return this.$route.path === this.link;
      }
    },
  },
};
</script>

<style>
</style>