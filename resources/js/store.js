import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        token: localStorage.getItem('access_token') || null,
    },
    getters: {
        loggedIn(state) {
            return state.token !== null
        },
    },
    mutations: {
        retrieveToken(state, token) {
            state.token = token
        },
        destroyToken(state) {
            state.token = null
        },
        clearTodos(state) {
            state.todos = []
        },
    },
    actions: {
        register(context, data) {
            return new Promise((resolve, reject) => {
                axios.post('/register', {
                        name: data.name,
                        email: data.email,
                        password: data.password,
                    })
                    .then(response => {
                        resolve(response)
                    })
                    .catch(error => {
                        reject(error)
                    })
            })
        },
        destroyToken(context) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token

            if (context.getters.loggedIn) {
                return new Promise((resolve, reject) => {
                    axios.post('/logout')
                        .then(response => {
                            localStorage.removeItem('access_token')
                            context.commit('destroyToken')
                            resolve(response)
                            // console.log(response);
                            // context.commit('addTodo', response.data)
                        })
                        .catch(error => {
                            localStorage.removeItem('access_token')
                            context.commit('destroyToken')
                            reject(error)
                        })
                })
            }
        },
        retrieveToken(context, credentials) {

            return new Promise((resolve, reject) => {
                axios.post('/login', {
                        username: credentials.username,
                        password: credentials.password,
                    })
                    .then(response => {
                        const token = response.data.login.access_token

                        localStorage.setItem('access_token', token)
                        context.commit('retrieveToken', token)
                        resolve(response)
                        // console.log(response);
                        // context.commit('addTodo', response.data)
                    })
                    .catch(error => {
                        console.log(error)
                        reject(error)
                    })
            })
        },
    }
})
