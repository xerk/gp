import Vue from 'vue'
import Router from 'vue-router'
import Home from './view/Home'

Vue.use(Router)

export default new Router({
    mode: 'history',
    bas: process.env.BASE_URL,
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            meta: {
                title: 'HomePage',
            }
        },
    ]
})
