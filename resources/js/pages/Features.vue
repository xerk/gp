<template>
    <div class="features">
        <v-layout row wrap align-center class="text-xs-center pt-5 mt-3">
            <v-container>
                <h1 class="font-weight-medium display-3 mb-4 greyd4--text">Features</h1>
            </v-container>
        </v-layout>
        <section>
            <v-layout column wrap class="my-5" align-center>
                <v-flex xs12 sm4 class="my-3">
                    <div class="text-xs-center">
                        <h2 class="headline">The best way to share your amazing stuff</h2>
                        <span class="subheading">
                            No more restrictions, no more limits
                        </span>
                    </div>
                </v-flex>
                <v-flex xs12>
                    <v-container grid-list-xl>
                        <v-layout row wrap align-center>
                            <v-flex xs12 md4>
                                <v-card class="elevation-0 transparent">
                                    <v-card-text class="text-xs-center">
                                        <v-icon x-large class="blue--text text--lighten-2">public</v-icon>
                                    </v-card-text>
                                    <v-card-title primary-title class="layout justify-center">
                                        <div class="headline text-xs-center">Reach the world</div>
                                    </v-card-title>
                                    <v-card-text>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse architecto
                                        adipisci at. Beatae accusantium nulla quia provident voluptas libero tempore
                                        sapiente atque dicta, voluptates repudiandae magni, voluptatum molestiae nostrum
                                        id.
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                            <v-flex xs12 md4>
                                <v-card class="elevation-0 transparent">
                                    <v-card-text class="text-xs-center">
                                        <v-icon x-large class="blue--text text--lighten-2">flash_on</v-icon>
                                    </v-card-text>
                                    <v-card-title primary-title class="layout justify-center">
                                        <div class="headline">Fast feedback</div>
                                    </v-card-title>
                                    <v-card-text>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque vero quae
                                        voluptates quisquam hic. Fugit eum similique eveniet architecto optio doloribus
                                        accusantium esse vel ipsam doloremque et nesciunt, eius id.
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                            <v-flex xs12 md4>
                                <v-card class="elevation-0 transparent">
                                    <v-card-text class="text-xs-center">
                                        <v-icon x-large class="blue--text text--lighten-2">share</v-icon>
                                    </v-card-text>
                                    <v-card-title primary-title class="layout justify-center">
                                        <div class="headline text-xs-center">Create new connections</div>
                                    </v-card-title>
                                    <v-card-text>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Error delectus minus
                                        deleniti, nam placeat temporibus, ducimus consequatur perspiciatis accusantium
                                        reprehenderit voluptatem laboriosam saepe qui dolorum autem deserunt maiores,
                                        facilis dicta.
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                            <v-flex xs12 md4>
                                <v-card class="elevation-0 transparent">
                                    <v-card-text class="text-xs-center">
                                        <v-icon x-large class="blue--text text--lighten-2">share</v-icon>
                                    </v-card-text>
                                    <v-card-title primary-title class="layout justify-center">
                                        <div class="headline text-xs-center">Create new connections</div>
                                    </v-card-title>
                                    <v-card-text>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Error delectus minus
                                        deleniti, nam placeat temporibus, ducimus consequatur perspiciatis accusantium
                                        reprehenderit voluptatem laboriosam saepe qui dolorum autem deserunt maiores,
                                        facilis dicta.
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                            <v-flex xs12 md4>
                                <v-card class="elevation-0 transparent">
                                    <v-card-text class="text-xs-center">
                                        <v-icon x-large class="blue--text text--lighten-2">share</v-icon>
                                    </v-card-text>
                                    <v-card-title primary-title class="layout justify-center">
                                        <div class="headline text-xs-center">Create new connections</div>
                                    </v-card-title>
                                    <v-card-text>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Error delectus minus
                                        deleniti, nam placeat temporibus, ducimus consequatur perspiciatis accusantium
                                        reprehenderit voluptatem laboriosam saepe qui dolorum autem deserunt maiores,
                                        facilis dicta.
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                            <v-flex xs12 md4>
                                <v-card class="elevation-0 transparent">
                                    <v-card-text class="text-xs-center">
                                        <v-icon x-large class="blue--text text--lighten-2">share</v-icon>
                                    </v-card-text>
                                    <v-card-title primary-title class="layout justify-center">
                                        <div class="headline text-xs-center">Create new connections</div>
                                    </v-card-title>
                                    <v-card-text>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Error delectus minus
                                        deleniti, nam placeat temporibus, ducimus consequatur perspiciatis accusantium
                                        reprehenderit voluptatem laboriosam saepe qui dolorum autem deserunt maiores,
                                        facilis dicta.
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-flex>
            </v-layout>
        </section>
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
