<template>
    <nav>
        <v-navigation-drawer temporary app v-model="drawer" class="white">
            <v-list>
                <v-list-tile v-for="link in drawerLinks" :key="link.text" router :to="link.route">
                    <v-list-tile-action>
                        <v-icon class="">{{link.icon}}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title class="">{{ link.title }}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <!-- <v-navigation-drawer temporary absolute right app v-model="drawer_2" fixed class="primary">
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
        </v-navigation-drawer> -->
        <v-toolbar app color="white" class="toolbar-shadow" scroll-off-screen>
            <v-toolbar-side-icon class=" hidden-md-and-up" @click="drawer = true"></v-toolbar-side-icon>
            <v-toolbar-title class="text-uppercase ">
                <img src="/images/logo.png" width="80px">
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <div v-for="item in menu" :key="item.title" class="hidden-sm-and-down">
                <v-btn flat :ripple="{ class: 'primary--text' }" text active-class="primary" router :to="item.route">
                    <span class="font-weight-regular">{{ item.title }}</span>
                </v-btn>
            </div>

            <v-spacer></v-spacer>
            <!-- <v-menu left bottom origin="center center" transition="scale-transition">
                <template v-slot:activator="{ on }">
                    <v-btn class="" v-on="on" flat>
                            <v-icon color="" left v-on="on">translate</v-icon>
                            <span class="primary--text">EN</span>
                        </v-btn>
                </template>
                <v-list>
                    <v-list-tile v-for="locale in locales" :key="locale.title" avatar @click="">
                        <v-list-tile-action>
                            <v-avatar size="32px">
                                <span :class="`flag-icon flag-icon-${locale.icon}`"></span>
                            </v-avatar>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <span>{{ locale.title }}</span>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-menu> -->
            <div class="hidden-sm-and-down">
                <v-tooltip v-if="!loggedIn" bottom class="mr-1">
                    <template v-slot:activator="{ on }">
                        <v-btn active-class="primary" icon flat to="/login">
                            <v-icon color="" dark v-on="on">power_settings_new</v-icon>
                        </v-btn>
                    </template>
                    <span>Login</span>
                </v-tooltip>
                <v-tooltip v-if="!loggedIn" bottom class="mr-4">
                    <template v-slot:activator="{ on }">
                        <v-btn active-class="primary" icon flat to="/registration">
                            <v-icon color="" dark v-on="on">person_add</v-icon>
                        </v-btn>
                    </template>
                    <span>Registration</span>
                </v-tooltip>
                <v-tooltip v-if="loggedIn" bottom class="mr-1">
                    <template v-slot:activator="{ on }">
                        <v-btn active-class="primary" icon flat to="/logout">
                            <v-icon color="" dark v-on="on">power_settings_new</v-icon>
                        </v-btn>
                    </template>
                    <span>Logout</span>
                </v-tooltip>
                <v-menu v-if="loggedIn" v-model="menu2" :close-on-content-click="false" :nudge-width="200" offset-x>
                    <template v-slot:activator="{ on }">
                        <v-avatar  class="pointer" size="32px" v-on="on">
                            <!-- <v-gravatar :email="$auth.user.user.email" /> -->
                            <v-img v-if="$store.state.user" :src="'/storage/'+$store.state.user.avatar"
                                :lazy-src="'/storage/'+$store.state.user.avatar" alt="random image">

                                <v-layout slot="placeholder" fill-height align-center justify-center ma-0>
                                    <v-progress-circular indeterminate color="grey lighten-5">
                                    </v-progress-circular>
                                </v-layout>
                            </v-img>
                        </v-avatar>
                    </template>

                    <v-card>
                        <v-list>
                            <v-list-tile avatar>
                                <v-list-tile-avatar>
                                    <v-img v-if="$store.state.user" :src="'/storage/'+$store.state.user.avatar"
                                        :lazy-src="'/storage/'+$store.state.user.avatar" alt="random image">

                                        <v-layout slot="placeholder" fill-height align-center justify-center ma-0>
                                            <v-progress-circular indeterminate color="grey lighten-5">
                                            </v-progress-circular>
                                        </v-layout>
                                    </v-img>
                                </v-list-tile-avatar>

                                <v-list-tile-content>
                                    <v-list-tile-title>{{$store.state.user.name}}</v-list-tile-title>
                                    <v-list-tile-sub-title>{{$store.state.user.email}}</v-list-tile-sub-title>
                                </v-list-tile-content>

                                <v-list-tile-action>
                                    <v-btn :class="fav ? 'red--text' : ''" icon @click="fav = !fav">
                                        <v-icon>favorite</v-icon>
                                    </v-btn>
                                </v-list-tile-action>
                            </v-list-tile>
                        </v-list>

                        <v-divider></v-divider>

                        <v-list>
                            <v-list-tile>
                                <v-list-tile-action>
                                    <v-icon>person</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-sub-title><router-link style="text-decoration: none;" to="/profile">
                                        <v-btn flat href.prevent="" class="primary--text">Profile</v-btn>
                                    </router-link></v-list-tile-sub-title>
                            </v-list-tile>

                            <v-list-tile>
                                <v-list-tile-action>
                                    <v-icon>power_off</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-sub-title>
                                    <router-link to="/logout" style="text-decoration: none;">
                                        <v-btn flat href.prevent="" class="primary--text" style="text-decoration: none;">Logout</v-btn>
                                    </router-link>
                                </v-list-tile-sub-title>
                            </v-list-tile>
                        </v-list>

                        <v-card-actions>
                            <v-spacer></v-spacer>

                            <v-btn flat @click="menu2 = false">Cancel</v-btn>
                            <v-btn color="primary" flat @click="menu2 = false">Save</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-menu>
            </div>
            <!-- <v-btn icon class="hidden-md-and-up" @click="drawer_2 = true">
                <v-icon>more_vert</v-icon>
            </v-btn> -->
        </v-toolbar>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                drawer: false,
                drawer_2: false,
                locales: [{
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
                fav: true,
                menu2: false,
                message: false,
                hints: true,
                menu: [{
                        title: 'Home',
                        icon: 'home',
                        route: '/'
                    },
                    {
                        title: 'Features',
                        icon: 'featured_play_list',
                        route: '/features'
                    },
                    {
                        title: 'Categories',
                        icon: 'dashboard',
                        route: '/categories'
                    },
                    {
                        title: 'Contact Us',
                        icon: 'mail',
                        route: '/contact'
                    },
                    {
                        title: 'About',
                        icon: 'contact_support',
                        route: '/about'
                    },
                    {
                        title: 'Team',
                        icon: 'team',
                        route: '/team'
                    },
                ],
                drawerLinks: [{
                        title: 'Home',
                        icon: 'home',
                        route: '/',
                        auth: null
                    },
                    {
                        title: 'Features',
                        icon: 'featured_play_list',
                        route: '/features',
                        auth: null
                    },
                    {
                        title: 'Categories',
                        icon: 'dashboard',
                        route: '/categories',
                        auth: null
                    },
                    {
                        title: 'Contact Us',
                        icon: 'mail',
                        route: '/contact',
                        auth: null
                    },
                    {
                        title: 'About',
                        icon: 'contact_support',
                        route: '/about',
                        auth: null
                        
                    },
                    {
                        title: 'Login',
                        icon: 'power_settings_new',
                        route: '/login',
                        auth: false,
                    },
                    {
                        title: 'Registration',
                        icon: 'person_add',
                        route: '/registration',
                        auth: false,
                    },
                    {
                        title: 'Team',
                        icon: 'team',
                        route: '/team'
                    },
                    {
                        title: 'Profile',
                        icon: 'person_add',
                        route: '/profile',
                        auth: true,
                    },
                    {
                        title: 'Logout',
                        icon: 'person_add',
                        route: '/logout',
                        auth: true,
                    },
                    
                ],
            }
        },
        computed: {
            loggedIn() {
                return this.$store.getters.loggedIn
            }
        }
    }

</script>
<style scoped>
    .toolbar-shadow {
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.1), inset 0 -1px 0 0 #dfdfdf2b;
    }

</style>
