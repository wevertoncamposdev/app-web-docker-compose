<template>
  <MyHeader />
  <NewComponents />
  <AccessApi />
</template>

<script>
import MyHeader from './components/MyHeader.vue';
import NewComponents from './components/NewComponents.vue';
import AccessApi from './components/AccessApi.vue';

export default {
  name: 'App',
  components: {
    MyHeader,
    NewComponents,
    AccessApi
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
