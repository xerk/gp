<template>
    <section>
        <v-layout class="pb-5">
            <v-content>
                <v-container fill-height="fill-height">
                    <v-layout align-center="align-center" justify-center="justify-center">
                        <v-flex class="login-form text-xs-center">
                            <v-card light="light">
                                <v-card-text>
                                    <div class="title py-3">
                                        <template>Registration</template>
                                    </div>
                                    <v-form>
                                        
                                        <v-text-field v-model="user.name" light="light" prepend-icon="person"
                                            label="Name" type="name"></v-text-field>

                                        <v-text-field v-model="user.email" light="light" prepend-icon="email"
                                            label="Email" type="email"></v-text-field>

                                        <v-text-field v-model="user.password" light="light" prepend-icon="lock"
                                            label="Password" type="password"></v-text-field>

                                            <v-btn round block color="primary" class="button-shadow" depressed  type="submit" :loading="loading4"
                                                :disabled="loading4" @click="loader = 'loading4'">
                                                Sign up
                                                <template v-slot:loader>
                                                    <span class="custom-loader">
                                                        <v-icon light>cached</v-icon>
                                                    </span>
                                                </template>
                                            </v-btn>
                                    </v-form>
                                </v-card-text>
                            </v-card>
                            <div class="pt-4">
                                Already have an account? <v-btn round outline class="primary" to="/login" light="light">Login</v-btn>
                            </div>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-content>
        </v-layout>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                user: {
                    // email: 'admin@example.com',
                    // password: 'admin',
                    // name: 'John Doe',
                },
                options: {
                    isLoggingIn: true,
                    shouldStayLoggedIn: true,
                },
                loading4: false,
                loader: null,
            }
        },
        watch: {
            loader() {
                const l = this.loader
                this[l] = !this[l]

                setTimeout(() => (this[l] = false), 3000)

                this.loader = null
            }
        }
    }

</script>

<style>
</style>
