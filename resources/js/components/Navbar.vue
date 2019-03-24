<template>
    <v-app-bar>
        <v-toolbar flat app color="white">
            <v-toolbar-side-icon class="greyd1--text hidden-md-and-up" @click="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title class="text-uppercase greyd1--text">
                <span class="primary--text">SOS</span>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <div v-for="item in menu" :key="item.title" class="hidden-sm-and-down">
                <v-btn flat :ripple="{ class: 'primary--text' }" text active-class="primary" router :to="item.route">
                    <span class="font-weight-regular">{{ item.title }}</span>
                </v-btn>
            </div>

            <v-spacer></v-spacer>
            <v-menu left bottom origin="center center" transition="scale-transition">
                <template #activator="{ on }">
                    <v-btn class="greyd1--text" v-on="on" flat>
                            <v-icon color="greyd1--text" left dark v-on="on">translate</v-icon>
                            <span class="primary--text">EN</span>
                        </v-btn>
                </template>

                <v-list>
                    <v-list-tile v-for="locale in locales" :key="locale.title" @click="() => {}">
                        <v-list-tile-item>
                            <v-avatar size="32px">
                                <span :class="`flag-icon flag-icon-${locale.icon}`"></span>
                            </v-avatar>
                            <span>{{ locale.title }}</span>
                        </v-list-tile-item>
                    </v-list-tile>
                </v-list>
            </v-menu>
            <div class="hidden-sm-and-down">
                <v-tooltip bottom class="mr-1">
                    <template v-slot:activator="{ on }">
                        <v-btn class="greyd1--text" icon flat>
                            <v-icon color="greyd1--text" dark v-on="on">power_settings_new</v-icon>
                        </v-btn>
                    </template>
                    <span>Login</span>
                </v-tooltip>
                <v-tooltip bottom class="mr-4">
                    <template v-slot:activator="{ on }">
                        <v-btn class="greyd1--text" icon flat>
                            <v-icon color="greyd1--text" dark v-on="on">person_add</v-icon>
                        </v-btn>
                    </template>
                    <span>Registration</span>
                </v-tooltip>
                <v-avatar color="greyd1" class="pointer" size="32px">
                    <v-icon dark>account_circle</v-icon>
                </v-avatar>
            </div>
            <v-btn icon class="hidden-md-and-up" @click="drawer_2 = !drawer_2">
                <v-icon>more_vert</v-icon>
            </v-btn>
        </v-toolbar>

        <v-navigation-drawer app v-model="drawer" class="primary">
            <v-list>
                <v-list-tile v-for="link in menu" :key="link.text" router :to="link.route">
                    <v-list-tile-action>
                        <v-icon class="white--text">{{link.icon}}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title class="white--text">{{ link.title }}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <v-navigation-drawer right app v-model="drawer_2" class="primary">
            <v-list>
                <v-list-tile v-for="item in menu" :key="item.text" router :to="item.route">
                    <v-list-tile-action>
                        <v-icon class="white--text">{{item.icon}}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title class="white--text">{{ item.title }}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
    </v-app-bar>
</template>

<script>
    export default {
        data() {
            return {
                drawer: false,
                drawer_2: false,
                locales: [
                    {
                        title: 'Enlish',
                        code: 'EN',
                        icon: 'us'
                    },
                    {
                        title: 'Arabic',
                        code: 'AR',
                        icon: 'eg'
                    }
                ],
                menu: [{
                        title: 'Home',
                        icon: 'home',
                        route: '/'
                    },
                    {
                        title: 'Categories',
                        icon: 'dashboard',
                        route: 'categories'
                    },
                    {
                        title: 'Features',
                        icon: 'featured_play_list',
                        route: 'features'
                    },
                    {
                        title: 'Contact Us',
                        icon: 'mail',
                        route: 'contact'
                    },
                    {
                        title: 'About',
                        icon: 'contact_support',
                        route: 'about'
                    },
                ]
            }
        }
    }

</script>
