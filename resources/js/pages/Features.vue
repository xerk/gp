<template>
    <div class="features">
        <v-layout row wrap align-center class="text-xs-center pt-5 mt-3">
            <v-container>
                <h1 class="font-weight-medium display-3 mb-4 greyd4--text">Features</h1>
            </v-container>
        </v-layout>
        <v-layout row wrap class="ma-3">
            <v-flex xs12 sm12 md6 class="pa-4" overflow-x-hidden>
                <div class="grey lighten-5 section--organize">
                    <v-container class="padding--organize">
                        <h1 class="font-weight-medium display-2 mb-4 greyd4--text">Stay organized instantly</h1>
                        <p class="greyd4--text subheading">See what’s new at a glance, and decide what you want to read
                            and
                            respond to.</p>
                    </v-container>
                    <div style="">
                        <v-img
                            :src="`https://lh3.googleusercontent.com/zG9tmtU51B7DAJxWqj5dSc32bZty6C5mo48vp1Tozqucoo379R5Gz_RDrIfxTy5wF_BZ5n-5M85S9mF_DICltakJI__JDuMhhzStsw=w0`"
                            :lazy-src="`https://lh3.googleusercontent.com/zG9tmtU51B7DAJxWqj5dSc32bZty6C5mo48vp1Tozqucoo379R5Gz_RDrIfxTy5wF_BZ5n-5M85S9mF_DICltakJI__JDuMhhzStsw=w0`"
                            >
                            <template v-slot:placeholder>
                                <v-layout fill-height align-center justify-center ma-0>
                                    <v-progress-circular indeterminate color="primary"></v-progress-circular>
                                </v-layout>
                            </template>
                        </v-img>
                    </div>
                </div>
            </v-flex>
            <v-flex xs12 sm12 md6 right class="pa-4" overflow-x-hidden>
                <div class="grey lighten-5 section--organize">
                    <v-container class="padding--organize">
                        <h1 class="font-weight-medium display-2 mb-4 greyd4--text">Stay organized instantly</h1>
                        <p class="greyd4--text subheading">Get nudges that remind you to follow up and respond to messages, so that nothing slips through the cracks.</p>
                    </v-container>
                    <v-img
                        :src="`https://lh3.googleusercontent.com/wlf842vsNrbW70WRloE0LzJVOJfoL4lYMbqOEebLudfLr91bLou7Sb6Hu7f5C_uP9femGOjfLdns4B9q5rdzVBHx9NIGvOayPqbvRQ=w0`"
                        :lazy-src="`https://lh3.googleusercontent.com/wlf842vsNrbW70WRloE0LzJVOJfoL4lYMbqOEebLudfLr91bLou7Sb6Hu7f5C_uP9femGOjfLdns4B9q5rdzVBHx9NIGvOayPqbvRQ=w0`">
                        <template v-slot:placeholder>
                            <v-layout fill-height align-center justify-center ma-0>
                                <v-progress-circular indeterminate color="primary"></v-progress-circular>
                            </v-layout>
                        </template>
                    </v-img>
                </div>
            </v-flex>
        </v-layout>
    </div>
</template>
<script>
    export default {
        name: 'features',
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
