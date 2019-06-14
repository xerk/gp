import Vue from 'vue'
import Router from 'vue-router'
import Login from './pages/Login'
import Profile from './pages/Profile'
import Registration from './pages/Registration'
import Logout from './pages/Logout'
import Home from './pages/Home'
import Categories from './pages/Categories'
import Workers from './pages/Workers'
import Features from './pages/Features'
import Contact from './pages/Contact'
import About from './pages/About'
import Team from './pages/Team'
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
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                title: 'Login',
                requiresVisitor: true,
            },
            props: true,
        },
        {
            path: '/profile',
            name: 'profile',
            component: Profile,
            meta: {
                title: 'Profile',
                requiresAuth: true,
            },
            props: true,
        },
        {
            path: '/logout',
            name: 'logout',
            component: Logout
        },
        {
            path: '/registration',
            name: 'registration',
            component: Registration,
            meta: {
                title: 'Registration',
                requiresVisitor: true,
            },
            props: true,
        },
        {
            path: '/categories',
            name: 'categories',
            component: Categories,
            meta: {
                title: 'Categories',
            },
            props: true,
        },
        {
            path: '/categories/workers/:id',
            name: 'workers',
            component: Workers,
            meta: {
                title: 'Workers',
            },
            props: true,
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
        {
            path: '/team',
            name: 'team',
            component: Team,
            meta: {
                title: 'Team',
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
