<template>
    <div class="features">
        <v-layout row wrap align-center class="text-xs-center pt-5 mt-3">
            <v-container>
                <h1 class="font-weight-medium display-3 greyd4--text">Features</h1>
            </v-container>
        </v-layout>
        <section>
            <v-layout column wrap class="" align-center>
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
                                        <div class="headline text-xs-center">Professional Worker</div>
                                    </v-card-title>
                                    <v-card-text>
                                        GMS doesn't accept any worker except the ones who passes GMS interviews, quality assurance and safety, Every worker on GMS has a file includes a copy of national ID and clean criminal record
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                            <v-flex xs12 md4>
                                <v-card class="elevation-0 transparent">
                                    <v-card-text class="text-xs-center">
                                        <v-icon x-large class="blue--text text--lighten-2">attach_money</v-icon>
                                    </v-card-text>
                                    <v-card-title primary-title class="layout justify-center">
                                        <div class="headline">Pricing System</div>
                                    </v-card-title>
                                    <v-card-text>
                                        Worker had make it comfort instead of exhausting price negotiation after every process, As after the job done the system sends a message with the process price
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                            <v-flex xs12 md4>
                                <v-card class="elevation-0 transparent">
                                    <v-card-text class="text-xs-center">
                                        <v-icon x-large class="blue--text text--lighten-2">fas fa-star</v-icon>
                                    </v-card-text>
                                    <v-card-title primary-title class="layout justify-center">
                                        <div class="headline text-xs-center">Worker Rating</div>
                                    </v-card-title>
                                    <v-card-text>
                                        The system gives you an opportunity to make a review on the Worker after your job done so that the Worker could enhance his services
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
