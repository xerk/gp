<template>
    <div class="categories">
        <v-layout row wrap align-center class="text-xs-center grey lighten-5 pt-5">
            <v-container class="mt-3">
                <h1 class="font-weight-medium display-3 mb-4 greyd4--text">Categories</h1>
                <p class="greyd4--text subheading mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Veniam voluptatem dolor dolores, iusto, odio a eos minus saepe voluptates quia rem animi soluta
                    quod, hic sunt tenetur ratione excepturi reiciendis.</p>
            </v-container>
        </v-layout>
        <v-layout row wrap align-center class="text-xs-center grey lighten-5 px-5">
             <v-flex xs6 sm4 md3 lg2 class="mb-3 ma-3">
                <v-container>
                    <v-hover>
                        <v-card slot-scope="{ hover }" width="300" style="border-radius: 30px;">
                            <v-img :aspect-ratio="20/20" width="300" src="https://cdn.vuetifyjs.com/images/john.jpg">
                                <v-expand-transition>
                                    <div v-if="hover"
                                        class="transition-fast-in-fast-out text-xs-center orange darken-2 v-card--reveal display-1 white--text"
                                        style="height: 100%;">
                                        <div class="pt-5">
                                            <span>Electrician</span>
                                        </div>
                                        <v-btn class="white mt-5" large>
                                            <span>Show Workers</span>
                                        </v-btn>
                                    </div>
                                </v-expand-transition>
                            </v-img>
                        </v-card>
                    </v-hover>
                </v-container>
            </v-flex>
        </v-layout>
    </div>
</template>
<script>
    export default {
        name: 'categories',
        data() {
            return {
                avatarSize: 200,
                reviews: 413,
                value: 4.5
            }
        },
        methods: {}
    }

</script>
<style scoped>
    .toolbar-shadow {
        box-shadow: 0 2px 6px 0 rgba(124, 125, 125, 0.44), inset 0 -1px 0 0 #a7a7a733;
    }

    .v-card--reveal {
        align-items: center;
        bottom: 0;
        justify-content: center;
        position: absolute;
        width: 100%;
    }

</style>
