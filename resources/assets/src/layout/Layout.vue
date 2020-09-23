<template>
  <div class="layout-wrapper">
    <div class="layout-inner">
      <app-layout-navbar />

      <div class="layout-container">
        <div class="layout-content">
          <div class="router-transitions container flex-grow-1">
            <router-view />
          </div>
        </div>
      </div>
    </div>
    <div class="layout-overlay" @click="closeSidenav"></div>
  </div>
</template>

<script>
import LayoutNavbar from './LayoutNavbar'

export default {
  name: 'app-layout',
  components: {
    'app-layout-navbar': LayoutNavbar,
  },

  mounted () {
  },

  beforeDestroy () {
  },

  methods: {
    closeSidenav () {
    }
  }
}
</script>
