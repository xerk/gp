<template>
    <section>
        <v-layout class="pb-5 grey lighten-5">
            <v-snackbar v-model="snackbar" :right="'right'" :color="'success'" :timeout="4000" :top="'top'">
                {{ check.message }}
                <v-btn color="white" flat @click="snackbar = false">
                    Close
                </v-btn>
            </v-snackbar>
            <v-snackbar v-model="snackbar2" :right="'right'" :timeout="4000" :top="'top'" :multi-line="'multi-line'"
                :color="'error'">
                <div v-for="(value, key) in serverErrors" :key="key">
                    {{ value[0] }}
                </div>
                <v-btn color="white" flat @click="snackbar2 = false">
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
                                        <template>Registration</template>
                                    </div>
                                    <v-alert class="my-3" v-for="(value, key) in serverErrors" transition="scale-transition" dismissible :key="key" :value="serverErrors" color="error" icon="warning" outline>
                                        {{ value [0] }}
                                    </v-alert> 
                                    <v-form class="px-3">
                                        <v-text-field prepend-inner-icon="person"
                                            :error-messages="errors.collect('name')" data-vv-name="name"
                                            v-validate="'required'" flat class="auth-input mb-4" autofocus solo
                                            v-model="user.name" label="Name" type="text">
                                        </v-text-field>

                                        <v-text-field prepend-inner-icon="person"
                                            :error-messages="errors.collect('phone')" data-vv-name="phone"
                                            v-validate="'required'" flat class="auth-input mb-4" solo
                                            v-model="user.phone" label="Phone" type="text">
                                        </v-text-field>

                                        <v-text-field prepend-inner-icon="email"
                                            :error-messages="errors.collect('email')" data-vv-name="email"
                                            v-validate="'required|email'" flat class="auth-input mb-4" solo
                                            v-model="user.email" label="Email" type="email">
                                        </v-text-field>

                                        <v-text-field :append-icon="show ? 'visibility' : 'visibility_off'"
                                            prepend-inner-icon="lock" @click:append="show = !show" flat
                                            class="auth-input mb-4" solo v-model="user.password" label="Password"
                                            :type="show ? 'text' : 'password'"></v-text-field>

                                        <v-text-field prepend-inner-icon="person"
                                            :error-messages="errors.collect('age')" data-vv-name="age"
                                            v-validate="'required'" flat class="auth-input mb-4" solo v-model="user.age"
                                            label="Age" type="number">
                                        </v-text-field>

                                        <v-layout row wrap>
                                            <v-flex xs12 sm6 md6>
                                                <v-switch v-model="user.gender" class="text-xs-center"
                                                    :label="`Gender ${user.gender ? 'Male' : 'Female'}`" color="red"
                                                    hide-details>
                                                </v-switch>
                                            </v-flex>
                                            <v-flex xs12 sm6 md6>
                                                <v-switch v-model="user.job" class="text-xs-center"
                                                    :label="`${user.job ? 'Worker' : 'Client'}`" color="red"
                                                    hide-details>
                                                </v-switch>
                                            </v-flex>
                                            <v-container fluid grid-list-xl v-if="user.job">
                                                <v-layout wrap align-center>
                                                    <v-flex xs12 sm6 d-flex>
                                                        <v-select v-model="user.category" class="pt-4" :items="categories" item-text="name" item-value="id" label="Choose Category"
                                                            :error-messages="errors.collect('category')"
                                                            data-vv-name="category" v-validate="'required'" outline>
                                                        </v-select>
                                                    </v-flex>
                                                    <v-flex xs12 sm6 d-flex>
                                                        <v-select v-model="user.pro" class="pt-4" :items="pro"
                                                            :error-messages="errors.collect('proffesional')"
                                                            data-vv-name="proffesional" v-validate="'required'"
                                                            label="Choose Proffesional" outline>
                                                        </v-select>
                                                    </v-flex>
                                                    <v-flex xs12 sm6 d-flex>
                                                        <v-select v-model="user.city" class="pt-4" :items="cities" item-text="city" item-value="id" label="Choose City" 
                                                            :error-messages="errors.collect('city')" data-vv-name="city"
                                                            v-validate="'required'" outline>
                                                        </v-select>
                                                    </v-flex>
                                                    <v-flex xs12 sm6 d-flex>
                                                        <v-select v-model="user.region" class="pt-4" :items="filteredData" item-text="region" item-value="id" label="Choose Region"
                                                            :error-messages="errors.collect('region')"
                                                            data-vv-name="region" v-validate="'required'" outline>
                                                        </v-select>
                                                    </v-flex>
                                                </v-layout>
                                            </v-container>
                                        </v-layout>
                                        <v-checkbox v-model="user.terms" color="primary" data-vv-name="terms"
                                            v-validate="'required'" :error-messages="errors.collect('terms')">
                                            <template v-slot:label>
                                                <div>
                                                    I agree that
                                                    <v-tooltip bottom>
                                                        <template v-slot:activator="{ on }">
                                                            <a target="_blank" href="http://vuetifyjs.com" @click.stop
                                                                v-on="on">
                                                                GMS
                                                            </a>
                                                        </template>
                                                        Opens in new window
                                                    </v-tooltip>
                                                    terms is cool
                                                </div>
                                            </template>
                                        </v-checkbox>
                                        <!-- <v-btn class="button-shadow primary" depressed type="submit" :loading="loading"
                                            :disabled="loading || user.password == ''" @click.prevent="register">
                                            Registration
                                        </v-btn> -->
                                        <v-btn :disabled="dialog || !isFormValid" :loading="dialog"
                                            class="button-shadow primary" depressed @click.prevent="register">
                                            Registration
                                        </v-btn>
                                        <v-dialog v-model="dialog" hide-overlay persistent width="300">
                                            <v-card color="primary" dark>
                                                <v-card-text>
                                                    Please stand by
                                                    <v-progress-linear indeterminate color="white" class="mb-0">
                                                    </v-progress-linear>
                                                </v-card-text>
                                            </v-card>
                                        </v-dialog>
                                        <v-divider></v-divider>
                                        <div class="line-heading py-4 greyd1--text">Log In to GMS?</div>
                                        <v-btn class="button-shadow" flat router :to="{ name: 'login'}">
                                            Sign In
                                        </v-btn>
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
                    name: '',
                    gender: true,
                    phone: '',
                    terms: '',
                    job: false,
                    pro: '',
                    category: '',
                    city: '',
                    region: '',
                    age: '',
                },
                show: false,
                loading: false,
                loader: null,
                snackbar: false,
                snackbar2: false,
                check: {
                    message: ''
                },
                items: ['Foo', 'Bar', 'Fizz', 'Buzz'],
                dialog: false,
                serverErrors: '',
                categories: [],
                cities: [],
                regions: [],
                pro: [0,1,2,3,4,5],
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
        computed: {
            isFormValid() {
                return !Object.keys(this.fields).some(key => this.fields[key].invalid)
            },
            filteredData() {
                let options = this.regions
                return options.filter(o => o.city_id == this.user.city)
            }
        },
        mounted() {
            this.$validator.localize('en', this.errors)
            this.retrieveCategories()
            this.retrieveCities()
            this.retrieveRegions()
        },
        methods: {
            register() {
                this.dialog = true
                setTimeout(() => {
                    this.$store.dispatch('register', this.user)
                        .then(response => {
                            this.snackbar = true
                            this.dialog = false
                            this.check.message = response.data.success_message
                            this.$router.push({
                                name: 'login',
                                params: {
                                    dataSuccessMessage: this.check.message,
                                    email : this.user.email
                                }
                            })
                        }).catch(error => {
                            //  this.errors = error.response.data.errors
                            this.snackbar2 = true
                            this.dialog = false
                            this.serverErrors = Object.values(error.response.data.errors)
                        })
                }, 3000);
            },
            retrieveCategories() {
                axios.get('/categories')
                        .then(response => {
                            this.categories = response.data.data
                        })
                        .catch(error => {
                            console.log(error)
                        })
            },
            retrieveCities() {
                axios.get('/cities')
                        .then(response => {
                            this.cities = response.data.data
                        })
                        .catch(error => {
                            console.log(error)
                        })
            },
            retrieveRegions() {
                axios.get('/regions')
                        .then(response => {
                            this.regions = response.data.data
                        })
                        .catch(error => {
                            console.log(error)
                        })
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

    .button-request {
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
