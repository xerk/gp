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
                <v-container class="pa-0">
        <v-layout wrap align-center justify-center row fill-height class="text-xs-center grey lighten-5 mt-0 mb-0">
             <v-flex xs6 sm3 md2 lg2 class="mb-3 ma-3 text-xs-center" v-for="category in categories.data" :key="category.id">
                    <v-hover>
                        <v-card slot-scope="{ hover }" width="300" style="border-radius: 50%;">
                            <v-img :aspect-ratio="20/20" width="300" :src="'/storage/' + category.image" :lazy-src="'/storage/' + category.image">
                                <v-expand-transition>
                                    <div v-if="hover"
                                        class="transition-fast-in-fast-out text-xs-center orange darken-2 v-card--reveal display-1 white--text"
                                        style="height: 100%;">
                                        <div class="pt-5">
                                            <span>{{ category.name }}</span>
                                        </div>
                                        <v-btn class="white mt-5" large router :to="{ name: 'workers', params: { id: category.id }}">
                                            <span>Show Workers</span>
                                        </v-btn>
                                    </div>
                                </v-expand-transition>
                            </v-img>
                        </v-card>
                    </v-hover>
                    <v-btn flat class="button-request primary" router :to="{ name: 'workers', params: { id: category.id }}">{{ category.name }} ({{category.count_workers}})</v-btn>
            </v-flex>
        </v-layout>
        </v-container>
    </div>
</template>
<script>
    export default {
        name: 'categories',
        data() {
            return {
                avatarSize: 200,
                reviews: 413,
                value: 4.5,
                categories: [],
            }
        },
        mounted() {
            this.retrieveCategories()
        },
        methods: {
            retrieveCategories() {
                    axios.get('/categories')
                        .then(response => {
                            this.categories = response.data
                        })
                        .catch(error => {
                            console.log(error)
                        })
            },
        }
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
