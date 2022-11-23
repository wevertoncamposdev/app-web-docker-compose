<template>
  <TheHeader />
  <AllUsers />
</template>

<script>
import TheHeader from './components/TheHeader.vue'
import AllUsers from './components/AllUsers.vue';

export default {
  name: 'App',
  components: {
    TheHeader,
    AllUsers

  },
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 0;
}

body {
  margin: auto;
}
</style>
