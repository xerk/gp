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
                <v-avatar v-if="loggedIn" class="pointer" size="32px">
                    <!-- <v-gravatar :email="$auth.user.user.email" /> -->
                </v-avatar>
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
                        title: 'Login',
                        icon: 'power_settings_new',
                        route: '/about'
                    },
                    {
                        title: 'Registeration',
                        icon: 'person_add',
                        route: '/about'
                    },
                    {
                        title: 'Team',
                        icon: 'team',
                        route: '/team'
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
