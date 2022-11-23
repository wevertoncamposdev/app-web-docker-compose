<template>
    <div class="users">
        <div v-for="(obj, index) in api" v-bind:key="obj.uuid">
           {{index}} - {{ obj.name }}
        </div>
    </div>
</template>

<script>
export default {
    name: 'App',
    data() {
        return {
            api: null
        }
    },
    mounted () {
        axios.get('http://loaclhost:8080/api/users')
        .then(response => (this.api = response))
    }
}
</script>

<style>
.users {
    margin-top: 60px;
    background-color: rgb(104, 132, 145);
    color: rgb(203, 216, 227);
}
</style>