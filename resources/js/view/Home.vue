<template>
    <div class="home">
        <v-layout row wrap align-center>
            <v-flex xs12 sm12 md6>
                <v-container class="mt-5">
                    <h1 class="font-weight-medium display-2 my-4 text-uppercase greyd1--text">SOS Application</h1>
                    <p class="grey--text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam voluptatem dolor dolores, iusto, odio a eos minus saepe voluptates quia rem animi soluta quod, hic sunt tenetur ratione excepturi reiciendis.</p>
                    <v-btn outline color="primary">
                        <v-icon left>cloud_download</v-icon>
                        <span>Download</span>
                    </v-btn>
                    <v-btn class="primary" flat>
                        <v-icon left>power_settings_new</v-icon>
                        <span>Sign in</span>
                    </v-btn>
                </v-container>
            </v-flex>
            <v-flex xs12 sm12 md6 right>
                <v-img
                  :src="`https://kamel-ouda.com//storage/settings/December2018/XBdxr2eBJkAyDCxibCSW.png`"
                  :lazy-src="`https://kamel-ouda.com//storage/settings/December2018/XBdxr2eBJkAyDCxibCSW.png`"
                    max-height="550"
                    position="center"
                >
                  <template v-slot:placeholder>
                    <v-layout
                      fill-height
                      align-center
                      justify-center
                      ma-0
                    >
                      <v-progress-circular indeterminate color="primary"></v-progress-circular>
                    </v-layout>
                  </template>
                </v-img>
            </v-flex>
        </v-layout>
        <v-container class="my-5">

            <v-layout row class="mb-3">
                <v-tooltip top>
                    <v-btn small flat color="greyd1" @click="sortBy('title')" slot="activator">
                        <v-icon left small>folder</v-icon>
                        <span class="caption text-lowercase">By project name</span>
                    </v-btn>
                    <span>Sort title</span>
                </v-tooltip>
                <v-tooltip top>
                    <v-btn small flat color="greyd1" @click="sortBy('person')" slot="activator">
                        <v-icon left small>person</v-icon>
                        <span class="caption text-lowercase">By person</span>
                    </v-btn>
                    <span>Sort person</span>
                </v-tooltip>
            </v-layout>

            <v-card flat class="" v-for="project in projects" :key="project.title">
                <v-layout row wrap :class="`pa-3 project ${project.status}`">
                    <v-flex xs12 md6>
                        <div class="caption greyd1--text">Project title</div>
                        <div>{{ project.title }}</div>
                    </v-flex>
                    <v-flex xs6 sm4 md2>
                        <div class="caption greyd1--text">Person</div>
                        <div>{{ project.person }}</div>
                    </v-flex>
                    <v-flex xs6 sm4 md2>
                        <div class="caption greyd1--text">Due by</div>
                        <div>{{ project.due }}</div>
                    </v-flex>
                    <v-flex xs12 sm4 md2>
                        <div class="right">
                            <v-chip small :class="`${project.status} text-capitalize white--text caption my-2`">{{ project.status }}</v-chip>
                        </div>
                    </v-flex>
                </v-layout>
                <v-divider></v-divider>
            </v-card>
        </v-container>
    </div>
</template>
<script>
export default {
    name: 'home',
    data() {
        return {
            projects: [
                { title: 'Design a new website', person: 'XerK', due: '1st Jan 2019', status: 'complete', content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse consequatur et dolore, sapiente iste quas ipsum sequi voluptates dolorem inventore quos omnis atque, error iusto, adipisci suscipit itaque repudiandae. Voluptatem?'},
                { title: 'Code up the homepage', person: 'Chun Li', due: '10st Jan 2019', status: 'complete', content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse consequatur et dolore, sapiente iste quas ipsum sequi voluptates dolorem inventore quos omnis atque, error iusto, adipisci suscipit itaque repudiandae. Voluptatem?'},
                { title: 'Design video thumbanils', person: 'Ryu', due: '20st Dec 2018', status: 'overdue', content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse consequatur et dolore, sapiente iste quas ipsum sequi voluptates dolorem inventore quos omnis atque, error iusto, adipisci suscipit itaque repudiandae. Voluptatem?'},
                { title: 'Create a community forum', person: 'Gouken', due: '20st Oct 2018', status: 'ongoing', content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse consequatur et dolore, sapiente iste quas ipsum sequi voluptates dolorem inventore quos omnis atque, error iusto, adipisci suscipit itaque repudiandae. Voluptatem?'},
            ]
        }
    },
    methods: {
        sortBy(prop) {
            this.projects.sort((a,b) => a[prop] < b[prop] ? -1 : 1)
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
</style>
