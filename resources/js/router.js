import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home'
import Error403 from './views/Error403'
import Error404 from './views/Error404'

Vue.use(Router)

export default new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            meta: {
                title: 'HomePage',
            }
        },
        {
            name: '403',
            path: '/403',
            component: Error403,
        },
        {
            name: '404',
            path: '/404',
            component: Error404,
        },
        {
            name: 'catch-all',
            path: '*',
            component: Error404,
        },
    ]
})
