
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import router from './router'
import Vuetify from 'vuetify'
import colors from 'vuetify/es5/util/colors'

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
    router: router,
});
