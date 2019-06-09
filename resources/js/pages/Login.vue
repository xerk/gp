<template>
    <section>
        <v-layout class="pb-5 grey lighten-5">
            <v-snackbar
                v-model="snackbar"
                :right="'right'"
                :timeout="6000"
                :top="'top'"
                >
                {{ check.message }}
                <v-btn
                    color="pink"
                    flat
                    @click="snackbar = false"
                >
                    Close
                </v-btn>
            </v-snackbar>
            <v-content>
                <v-container fill-height="fill-height">
                    <v-layout align-center="align-center" class="justify-center">
                        <v-flex class="login-form text-xs-center">
                            <v-card flat class="card">
                                <v-card-text>
                                    <div class="title mb-4">
                                        <template v-if="!validatEmail">Log in and get to work</template>
                                        <template v-if="validatEmail">Welcome</template>
                                    </div>
                                    <p class="body-1 py-1" v-if="validatEmail && user.email">{{ user.email }}</p>
                                    <v-form class="px-5">
                                        <v-text-field 
                                            v-if="!validatEmail" 
                                            prepend-inner-icon="email" 
                                            :error-messages="errors.collect('email')"
                                            data-vv-name="email"
                                            v-validate="'required|email'"
                                            flat class="auth-input mb-5" 
                                            autofocus
                                            solo v-model="user.email" 
                                            label="Email" 
                                            type="email">
                                        </v-text-field>
                                        
                                        <v-text-field v-if="validatEmail" :append-icon="show ? 'visibility' : 'visibility_off'" prepend-inner-icon="lock" @click:append="show = !show" flat class="auth-input mb-4" autofocus
                                            solo v-model="user.password" label="Password" :type="show ? 'text' : 'password'"></v-text-field>


                                        <v-checkbox class="pb-3" v-if="validatEmail" v-model="options.shouldStayLoggedIn" color="primary"
                                            light="light" label="Stay logged in?" hide-details="hide-details">
                                        </v-checkbox>
                                        <v-btn v-if="!validatEmail" class="button-shadow primary" depressed type="submit" :loading="loading"
                                            :disabled="loading || user.email == ''" @click="checkEmail">
                                            Continue
                                        </v-btn>
                                        <v-btn v-if="validatEmail" class="button-shadow primary" depressed type="submit" :loading="loading"
                                            :disabled="loading || user.password == ''" @click.prevent="login">
                                            Log In
                                        </v-btn>
                                        <div v-if="validatEmail" href="#" @click.prevent="notYour" class="mt-3 primary--text"><a href="#" class="decoration-link">Not you?</a></div>
                                        <div v-if="!validatEmail">
                                            <v-divider></v-divider>
                                            <div class="line-heading py-4 greyd1--text">New to GMS?</div>
                                            <v-btn class="button-shadow" flat to="/registration">
                                                Sign Up
                                            </v-btn>
                                        </div>
                                    </v-form>
                                </v-card-text>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-content>
        </v-layout>
    </section>
</template>

<script>
    export default {
        $_veeValidate: {
        validator: 'new'
        },
        data() {
            return {
                user: {
                    email: '',
                    password: '',
                    stayLogin: false,
                },
                options: {
                    isLoggingIn: true,
                    shouldStayLoggedIn: true,
                },
                show: false,
                loading: false,
                loader: null,
                validatEmail: false,
                snackbar: false,
                check: {
                    message: ''
                }
            }
        },
        watch: {
            loader() {
                const l = this.loader
                this[l] = !this[l]

                setTimeout(() => (this[l] = false), 3000)

                this.loader = null
            }
        },
        mounted() {
            this.$validator.localize('en', this.errors)
        },
        methods: {
            checkEmail() {
                this.$validator.validateAll()
                this.loading = true
                axios.post(`checkEmail`, {
                    email: this.user.email
                })
                    .then(response => {
                        this.loading = false
                        this.snackbar = true
                        if (response.data.status === true) {
                            this.validatEmail = true
                        }
                        this.check = response.data
                    })
                    .catch(error => {
                        //  this.errors = error.response.data.errors
                        this.loading = false
                    })
            },
            login() {
                this.$store.dispatch('retrieveToken', {
                    username: this.user.email,
                    password: this.user.password,
                })
                .then(response => {
                    this.loading = false
                    this.$router.push({ name: 'home' })
                })
                .catch(error => {
                    //  this.errors = error.response.data.errors
                    this.loading = false
                })
            },
            notYour() {
                this.validatEmail = false
            }
        }
    }

</script>

<style>
    .login-form {
        max-width: 500px;
    }
    .decoration-link {
        text-decoration: none;
    }
    .decoration-link:hover {
        text-decoration: underline;
    }
    .button-shadow {
        -webkit-box-shadow: 0 1px 6px rgba(57, 73, 76, 0.35);
        box-shadow: 0 1px 6px rgba(57, 73, 76, 0.35);
        padding: 11px 60px;
        font-size: 14px;
        line-height: 14px;
        height: 40px;
        text-align: center;
        border-radius: 2px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        display: inline-block;
        -webkit-font-smoothing: antialiased;
        margin: 0 20px 30px 0;
        font-weight: 500;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        white-space: nowrap;
        background-image: none;
        -webkit-transition: all .15s;
        transition: all .15s;
    }

    .auth-input {
        width: 100%;
        min-height: 50px;
        height: 50px;
        border: 1px solid #E0E0E0;
        border-radius: 2px;
        color: #222;
        background-color: #e8f0fe;
        background-image: none;
        background-clip: padding-box;
        font-size: 16px;
        line-height: 18px;
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    }

    .auth-input:hover,
    .auth-input:focus {
        border-color: #f57f17;
        -webkit-box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.3);
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .card {
        position: relative;
        background-color: #fff;
        margin: 30px -30px;
        padding: 30px;
        -webkit-box-shadow: 0 1px 6px rgba(57, 73, 76, 0.35);
        box-shadow: 0 1px 6px rgba(57, 73, 76, 0.35);
    }

</style>
