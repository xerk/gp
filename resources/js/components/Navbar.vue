<template>
    <nav>
        <v-toolbar flat app>
            <v-toolbar-side-icon class="greyd1--text hidden-md-and-up" @click="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title class="text-uppercase greyd1--text">
                <span class="primary--text">SOS</span>
                <span class="font-weight-light  greyd1--text">Application</span>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <div v-for="item in menu" :key="item.title">
                <v-btn flat color="primary">
                    <v-icon left>{{ item.icon }}</v-icon>
                    <span>{{ item.title }}</span>
                </v-btn>
            </div>

            <v-spacer></v-spacer>
            <v-tooltip bottom class="mr-1">
                <template v-slot:activator="{ on }">
                    <v-btn class="primary--text" flat>
                        <v-icon color="primary" left dark v-on="on">translate</v-icon>
                        <span>EN</span>
                    </v-btn>
                </template>
                <span>English</span>
            </v-tooltip>
            <v-tooltip bottom class="mr-1">
                <template v-slot:activator="{ on }">
                    <v-btn class="primary--text" icon flat>
                        <v-icon color="primary" dark v-on="on">power_settings_new</v-icon>
                    </v-btn>
                </template>
                <span>Login</span>
            </v-tooltip>
            <v-tooltip bottom class="mr-4">
                <template v-slot:activator="{ on }">
                    <v-btn class="primary--text" icon flat>
                        <v-icon color="primary" dark v-on="on">person_add</v-icon>
                    </v-btn>
                </template>
                <span>Registration</span>
            </v-tooltip>
            <v-avatar color="primary" class="pointer" size="32px">
                <v-icon dark>account_circle</v-icon>
            </v-avatar>
        </v-toolbar>
<!--
        <v-navigation-drawer app v-model="drawer" class="primary">
            <v-list>
                <v-list-tile v-for="link in links" :key="link.text" router :to="link.route">
                    <v-list-tile-action>
                        <v-icon class="white--text">{{link.icon}}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title class="white--text">{{ link.text }}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer> -->
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                drawer: false,
                menu: [{
                        title: 'Home',
                        icon: 'home',
                        route: '/'
                    },
                    {
                        title: 'Categories',
                        icon: 'dashboard',
                        route: '/'
                    },
                    {
                        title: 'Features',
                        icon: 'featured_play_list',
                        route: '/'
                    },
                    {
                        title: 'Contact Us',
                        icon: 'mail',
                        route: '/'
                    },
                    {
                        title: 'About',
                        icon: 'contact_support',
                        route: '/'
                    },
                ]
            }
        }
    }

</script>
