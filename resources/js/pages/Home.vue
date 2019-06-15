<template>
    <div class="home">
        <v-layout row wrap align-center class="grey lighten-5 pt-5">
            <v-flex xs12 sm12 md6>
                <v-container class="mt-5">
                    <h1 class="font-weight-medium display-3 mb-4 greyd4--text">Give me service</h1>
                    <p class="greyd4--text subheading mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Veniam voluptatem dolor dolores, iusto, odio a eos minus saepe voluptates quia rem animi soluta
                        quod, hic sunt tenetur ratione excepturi reiciendis.</p>
                    <v-btn outline large color="primary" class="subheading">
                        <v-icon left>cloud_download</v-icon>
                        <span>Download</span>
                    </v-btn>
                    <v-btn class="primary subheading" router to="/login" large flat>
                        <v-icon left>power_settings_new</v-icon>
                        <span>Sign in</span>
                    </v-btn>
                </v-container>
            </v-flex>
            <v-flex xs12 sm12 md6 right>
                <v-img
                    :src="`/images/sce.png`"
                    :lazy-src="`/images/sce.png`"
                    position="center">
                    <template v-slot:placeholder>
                        <v-layout fill-height align-center justify-center ma-0>
                            <v-progress-circular indeterminate color="primary"></v-progress-circular>
                        </v-layout>
                    </template>
                </v-img>
            </v-flex>
        </v-layout>
        <v-layout row wrap>
            <v-flex xs12 sm12 md12 text-xs-center>
                <v-container class="mt-5">
                    <h1 class="font-weight-medium display-3 mb-4 greyd4--text">Experience Gmail on any device</h1>
                    <p class="greyd4--text subheading mb-5">The ease & simplicity of Gmail, wherever you are.</p>
                </v-container>
            </v-flex>
            <v-flex xs12 sm12 md12 right>
                <v-img
                    :src="`/images/sce1.png`"
                    :lazy-src="`/images/sce1.png`"
                    position="center">
                    <template v-slot:placeholder>
                        <v-layout fill-height align-center justify-center ma-0>
                            <v-progress-circular indeterminate color="primary"></v-progress-circular>
                        </v-layout>
                    </template>
                </v-img>
            </v-flex>
        </v-layout>
        <v-layout row wrap class="ma-3">
            <v-container>
                <h1 class="text-md-center font-weight-medium display-3 mb-4 greyd4--text">Features</h1>
            </v-container>
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
                            :src="`/images/sce2.png`"
                            :lazy-src="`/images/sce2.png`"
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
                        :src="`/images/sce3.png`"
                        :lazy-src="`/images/sce3.png`">
                        <template v-slot:placeholder>
                            <v-layout fill-height align-center justify-center ma-0>
                                <v-progress-circular indeterminate color="primary"></v-progress-circular>
                            </v-layout>
                        </template>
                    </v-img>
                </div>
            </v-flex>
        </v-layout>
        <v-layout row wrap class="mx-5 section--padding-144">
            <v-flex xs12 sm12 md6>
                <v-container class="pb-5 padding--organize">
                    <h1 class="font-weight-medium display-2 mb-4 greyd4--text">Take action right from the inbox</h1>
                    <p class="greyd4--text subheading">View attachments, RSVP to events, snooze messages and more without opening any emails.</p>
                </v-container>
            </v-flex>
            <v-flex xs12 sm12 md6 right overflow-x-hidden>
                <v-img
                    :src="`/images/sce4.png`"
                    :lazy-src="`/images/sce4.png`">
                    <template v-slot:placeholder>
                        <v-layout fill-height align-center justify-center ma-0>
                            <v-progress-circular indeterminate color="primary"></v-progress-circular>
                        </v-layout>
                    </template>
                </v-img>
            </v-flex>
        </v-layout>
        <v-layout row wrap align-center class="mx-5 section--padding-144 grey lighten-5">
            <v-flex xs12 sm12 md6 right overflow-x-hidden>
                <v-img
                    :src="`/images/sce5.png`"
                    :lazy-src="`/images/sce5.png`">
                    <template v-slot:placeholder>
                        <v-layout fill-height align-center justify-center ma-0>
                            <v-progress-circular indeterminate color="primary"></v-progress-circular>
                        </v-layout>
                    </template>
                </v-img>
            </v-flex>
            <v-flex xs12 sm12 md6>
                <v-container class="pb-5 padding--organize">
                    <h1 class="font-weight-medium display-2 mb-4 greyd4--text">Avoid suspicious emails</h1>
                    <p class="greyd4--text subheading">Gmail blocks 99.9% of dangerous emails before they reach you. If we think something seems phish-y, you’ll get a warning.</p>
                </v-container>
            </v-flex>
        </v-layout>
        <v-layout row wrap class="mx-5 section--padding-144">
            <v-flex xs12 sm12 md12 right overflow-x-hidden class="text-xs-center">
                <v-img class="img-central"
                    :src="`/images/logo.png`"
                    :lazy-src="`/images/logo.png`"
                    max-width="128">
                    <template v-slot:placeholder>
                        <v-layout fill-height align-center justify-center ma-0>
                            <v-progress-circular indeterminate color="primary"></v-progress-circular>
                        </v-layout>
                    </template>
                </v-img>
            </v-flex>
            <v-flex xs12 sm12 md12 text-xs-center>
                <v-container>
                    <h1 class="font-weight-medium display-2 mb-4 greyd4--text">Get started with GMS</h1>
                    <v-btn class="primary subheading py-2" router to="/registration" large flat>
                        <span class="text-none">Create an account</span>
                    </v-btn>
                </v-container>
            </v-flex>
        </v-layout>
    </div>
</template>
<script>
    export default {
        name: 'home',
        data() {
            return {
                projects: [{
                        title: 'Design a new website',
                        person: 'XerK',
                        due: '1st Jan 2019',
                        status: 'complete',
                        content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse consequatur et dolore, sapiente iste quas ipsum sequi voluptates dolorem inventore quos omnis atque, error iusto, adipisci suscipit itaque repudiandae. Voluptatem?'
                    },
                    {
                        title: 'Code up the homepage',
                        person: 'Chun Li',
                        due: '10st Jan 2019',
                        status: 'complete',
                        content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse consequatur et dolore, sapiente iste quas ipsum sequi voluptates dolorem inventore quos omnis atque, error iusto, adipisci suscipit itaque repudiandae. Voluptatem?'
                    },
                    {
                        title: 'Design video thumbanils',
                        person: 'Ryu',
                        due: '20st Dec 2018',
                        status: 'overdue',
                        content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse consequatur et dolore, sapiente iste quas ipsum sequi voluptates dolorem inventore quos omnis atque, error iusto, adipisci suscipit itaque repudiandae. Voluptatem?'
                    },
                    {
                        title: 'Create a community forum',
                        person: 'Gouken',
                        due: '20st Oct 2018',
                        status: 'ongoing',
                        content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse consequatur et dolore, sapiente iste quas ipsum sequi voluptates dolorem inventore quos omnis atque, error iusto, adipisci suscipit itaque repudiandae. Voluptatem?'
                    },
                ]
            }
        },
        mounted() {
            this.$store.dispatch('retrieveUser')
        },
        methods: {
            sortBy(prop) {
                this.projects.sort((a, b) => a[prop] < b[prop] ? -1 : 1)
            }
        }
    }

</script>
<style>
    .project.complete {
        border-left: 4px solid #3cd1c2;
    }

    .project.ongoing {
        border-left: 4px solid orange;
    }

    .project.overdue {
        border-left: 4px solid tomato;
    }

    .v-chip.complete {
        background: #3cd1c2;
    }

    .v-chip.ongoing {
        background: orange;
    }

    .v-chip.overdue {
        background: tomato;
    }
    .section--organize {
        min-height: 560px;
    }
    .padding--organize {
        padding: 8%
    }
    .section--padding-144 {
        padding-bottom: 144px;
        padding-top: 144px;
    }
    .img-central {
        margin: 0 auto;
    }
</style>
