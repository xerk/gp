import Vue from 'vue'
import Router from 'vue-router'
import Home from './pages/Home'
import Categories from './pages/Categories'
import Features from './pages/Features'
import Contact from './pages/Contact'
import About from './pages/About'
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
                title: 'Home',
            }
        },
        {
            path: '/categories',
            name: 'categories',
            component: Categories,
            meta: {
                title: 'Categories',
            }
        },
        {
            path: '/features',
            name: 'features',
            component: Features,
            meta: {
                title: 'Features',
            }
        },
        {
            path: '/contact',
            name: 'contact',
            component: Contact,
            meta: {
                title: 'Contact Us',
            }
        },
        {
            path: '/about',
            name: 'about',
            component: About,
            meta: {
                title: 'About',
            }
        },


        // Error Pages
        {
            name: '403',
            path: '/403',
            component: Error403,
            meta: {
                title: '403',
            }
        },
        {
            name: '404',
            path: '/404',
            component: Error404,
            meta: {
                title: '404',
            }
        },
        {
            name: 'catch-all',
            path: '*',
            component: Error404,
            meta: {
                title: '404',
            }
        },
    ]
})
