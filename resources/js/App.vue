<template>
    <v-app class="grey lighten-4" transition="slide-x-transition">
        <Navbar />
        <v-content class="mx-4 mb-4">
            <router-view></router-view>
        </v-content>
        <Footer />
    </v-app>
</template>

<script>
import Navbar from "./components/Navbar"
import Footer from "./components/Footer"

export default {
    name: 'App',
    components: {
        Navbar,
        Footer,
    }
}
</script>

<style>
.pointer {
    cursor: pointer;
}
</style>
