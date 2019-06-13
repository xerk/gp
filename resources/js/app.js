
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import '@fortawesome/fontawesome-free/css/all.css'
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader
import 'material-design-icons-iconfont/dist/material-design-icons.css' // Ensure you are using css-loader
import 'font-awesome/css/font-awesome.min.css' // Ensure you are using css-loader
import Vue from 'vue'
import router from './router'
import Vuetify from 'vuetify'
import colors from 'vuetify/es5/util/colors'
import VeeValidate from 'vee-validate';
import { store } from '@/store'
import Gravatar from 'vue-gravatar';

import Auth from './auth'

// Vue.prototype.$auth = user;
 
Vue.component('v-gravatar', Gravatar);

Vue.use(VeeValidate);

Vue.use(Vuetify, {
    theme: {
      primary: colors.yellow.darken4,
      primary1: colors.yellow.darken3,
      primary2: colors.yellow.darken2,
      secondary: '#b0bec5',
      accent: '#8c9eff',
      error: '#b71c1c',
      greyd1: colors.grey.darken1,
      greyd2: colors.grey.darken2,
      greyd3: colors.grey.darken3,
      greyd4: colors.grey.darken4,
    },
    iconfont: ['mdi', 'md', 'mdi', 'fa', 'fa4']
  })


  router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      if (!store.getters.loggedIn) {
        next({
          name: 'login',
        })
      } else {
        next()
      }
    } else if (to.matched.some(record => record.meta.requiresVisitor)) {
      if (store.getters.loggedIn) {
        next({
          name: 'todo',
        })
      } else {
        next()
      }
    } else {
      next()
    }
  })
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('App', require('./App.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
router.beforeEach((to, from, next) => {
  document.title = to.meta.title
  next()
})
const app = new Vue({
    el: '#app',
    store: store,
    router: router,
    mounted() {
      this.user()
    },
    methods: {
      user() {
          this.$store.dispatch('retrieveUser')
      },
    }
});
