<template>
  <div id="app">
    <router-view/>
  </div>
</template>

<style lang="scss">
@import './app';
</style>

<script>
export default {
  name: 'app',
  metaInfo: {
    title: 'Index',
    titleTemplate: '%s - Teste Prático'
  },
  updated () {
    
  }
}
</script>
