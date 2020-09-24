<template>
  <b-navbar toggleable="lg" variant="primary" class>
    <!-- Brand -->
    <b-navbar-brand to="/" class="text-white">
      <b-icon icon="app-indicator"></b-icon> Teste Prático
    </b-navbar-brand>

    <!-- Sidenav toggle -->
    <b-navbar-nav class="align-items-lg-center mr-auto mr-lg-4" v-if="sidenavToggle">
      <a
        class="nav-item nav-link px-0 ml-2 ml-lg-0"
        href="javascript:void(0)"
        @click="toggleSidenav"
      >
        <i class="ion ion-md-menu text-large align-middle" />
      </a>
    </b-navbar-nav>

    <!-- Navbar toggle -->
    <b-navbar-toggle target="app-layout-navbar"></b-navbar-toggle>

    <b-collapse is-nav id="app-layout-navbar">
      <b-navbar-nav class="align-items-lg-center">
        <b-nav-item v-for="item in menuItens" :key="item.path" :to="item.path">
          <span class="text-white">{{ item.desc }}</span>
        </b-nav-item>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>

<script>
export default {
  name: "app-layout-navbar",

  props: {
    sidenavToggle: {
      type: Boolean,
      default: true,
    },
  },

  data: () => {
    return {
      menuItens: [
        { path: "/", desc: "Inicio" },
        { path: "/add", desc: "Novo" },
      ],
    };
  },

  methods: {
    toggleSidenav() {
      this.sidenavToggle = !this.sidenavToggle;
    },
  },
};
</script>
