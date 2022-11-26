<template>
    <div class="container">
        <div class="row">
            <div class="col-3 px-1 py-2" v-for="obj in data" v-bind:key="obj.uuid">
                <div class="card w-100 h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ obj.name }}</h5>
                        <p class="card-text">{{ obj.about }}</p>
                        <a v-bind:href="'localhost:8080/api/disclosure/' + obj.uuid" class="btn btn-primary">Ver Mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import api from "@/services/api.js";

export default {

    data() {
        return {
            data: [],
        }
    },
    mounted() {
        api.get('/disclosure').then(response => {
            this.data = response.data;
        })
    }
};
</script>
