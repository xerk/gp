<template>
    <v-app class="white">
        <Navbar />
        <v-content class="">
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

    .custom-loader {
        animation: loader 1s infinite;
        display: flex;
    }

    @-moz-keyframes loader {
        from {
            transform: rotate(0);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @-webkit-keyframes loader {
        from {
            transform: rotate(0);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @-o-keyframes loader {
        from {
            transform: rotate(0);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes loader {
        from {
            transform: rotate(0);
        }

        to {
            transform: rotate(360deg);
        }
    }

</style>
