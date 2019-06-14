<template>
    <div>
        <v-snackbar v-model="snackbar" :right="'right'" :color="'success'" :timeout="6000" :top="'top'">
            {{ successMessage }}
            <v-btn color="white" flat @click="snackbar = false">
                Close
            </v-btn>
        </v-snackbar>
        <v-layout row justify-center>
            <v-btn class="primary button-request" v-if="loggedIn && user.job == 0" flat @click="dialog2 = true">Request
            </v-btn>
            <v-btn class="primary button-request" v-if="!loggedIn" flat @click="dialog = true" route
                :to="{name: 'login'}">Log In to request</v-btn>
            <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition" scrollable>
                <v-card tile>
                    <v-toolbar card dark color="primary">
                        <v-btn icon dark @click="dialog = false">
                            <v-icon>close</v-icon>
                        </v-btn>
                        <v-toolbar-title>
                            <v-avatar size="48" class="mr-3">
                                <v-img v-if="item" :src="'/storage/'+item.avatar" :lazy-src="'/storage/'+item.avatar"
                                    alt="random image">

                                    <v-layout slot="placeholder" fill-height align-center justify-center ma-0>
                                        <v-progress-circular indeterminate color="grey lighten-5">
                                        </v-progress-circular>
                                    </v-layout>

                                </v-img>
                            </v-avatar>{{ item.name }}
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-toolbar-items>
                            <v-btn dark flat @click="dialog2 = true">Request</v-btn>
                        </v-toolbar-items>
                        <!-- <v-menu bottom right offset-y>
                            <template v-slot:activator="{ on }">
                                <v-btn dark icon v-on="on">
                                    <v-icon>more_vert</v-icon>
                                </v-btn>
                            </template>
                            <v-list>
                                <v-list-tile v-for="(item, i) in items" :key="i" @click="">
                                    <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                                </v-list-tile>
                            </v-list>
                        </v-menu> -->
                    </v-toolbar>
                    <v-card-text>
                        <v-list three-line subheader>
                            <v-subheader>User Controls</v-subheader>
                            <v-list-tile avatar>
                                <v-avatar size="64" class="mr-3">
                                    <v-img v-if="item" :src="'/storage/'+item.avatar"
                                        :lazy-src="'/storage/'+item.avatar" alt="random image">

                                        <v-layout slot="placeholder" fill-height align-center justify-center ma-0>
                                            <v-progress-circular indeterminate color="grey lighten-5">
                                            </v-progress-circular>
                                        </v-layout>

                                    </v-img>
                                </v-avatar>
                                <v-list-tile-content>
                                    <v-list-tile-title><span class="primary--text title pr-1"
                                            style="vertical-align: inherit;">{{ item.name }}</span>
                                        ({{ item.workers.category.name }})</v-list-tile-title>
                                    <v-list-tile-sub-title v-if="item.email">Email: <span class="black--text"
                                            style="vertical-align: inherit;">{{item.email}}</span>
                                    </v-list-tile-sub-title>
                                    <v-list-tile-sub-title v-if="item.phone">Phone: <span class="black--text"
                                            style="vertical-align: inherit;">{{item.phone}}</span>
                                    </v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile avatar>
                                <v-list-tile-content>
                                    <v-list-tile-sub-title>City: <span class="black--text"
                                            style="vertical-align: inherit;">{{item.city.city}}</span> / Region: <span
                                            class="black--text"
                                            style="vertical-align: inherit;">{{item.region.region}}</span>
                                    </v-list-tile-sub-title>
                                    <v-list-tile-sub-title>Gender: <span class="black--text"
                                            style="vertical-align: inherit;">{{item.gender == 1 ? 'Male' : 'Female' }}</span>
                                        / Age: <span class="black--text"
                                            style="vertical-align: inherit;">{{item.age}}</span>
                                    </v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-divider></v-divider>
                            <v-list-tile avatar>
                                <v-list-tile-content>
                                    <v-list-tile-title>Price</v-list-tile-title>
                                    <v-list-tile-sub-title>{{item.workers.price}}
                                    </v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile avatar>
                                <v-list-tile-content>
                                    <v-list-tile-title>Experience</v-list-tile-title>
                                    <v-list-tile-sub-title><span
                                            style="display:none">{{ experience = parseInt(item.workers.experience) }}</span>
                                        <v-rating v-model="experience" background-color="grey lighten-1"
                                            :full-icon="'mdi-heart'" :half-icon="'mdi-heart-half-full'" :readonly="true"
                                            color="primary" medium></v-rating>
                                    </v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                        <v-divider></v-divider>
                        <v-list three-line subheader>
                            <v-subheader>Orders</v-subheader>
                            <v-slide-x-transition group>
                                <v-list-tile avatar v-for="order in orders" :key="order.id">
                                    <v-list-tile>
                                        <v-list-tile-action class="mr-4">
                                            <v-tooltip v-if="order.is_done == 1" bottom>
                                                <template v-slot:activator="{ on }">
                                                    <v-avatar color="teal" v-on="on">
                                                        <v-icon dark>star</v-icon>
                                                    </v-avatar>
                                                </template>
                                                <span>Accepted</span>
                                            </v-tooltip>
                                            <v-tooltip v-if="order.status == 1 && !order.is_done" bottom>
                                                <template v-slot:activator="{ on }">
                                                    <v-avatar color="teal" v-on="on">
                                                        <v-icon dark>check_circle</v-icon>
                                                    </v-avatar>
                                                </template>
                                                <span>Accepted</span>
                                            </v-tooltip>
                                            <v-tooltip v-else-if="order.status == 2  && !order.is_done" bottom>
                                                <template v-slot:activator="{ on }">
                                                    <v-avatar color="red" v-on="on">
                                                        <v-icon dark>close</v-icon>
                                                    </v-avatar>
                                                </template>
                                                <span>Declined</span>
                                            </v-tooltip>
                                            <v-tooltip v-else-if="!order.is_done" bottom>
                                                <template v-slot:activator="{ on }">
                                                    <v-avatar color="orange" v-on="on">
                                                        <v-icon dark>priority_high</v-icon>
                                                    </v-avatar>
                                                </template>
                                                <span>Pending</span>
                                            </v-tooltip>
                                        </v-list-tile-action>

                                    </v-list-tile>
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-avatar size="64" class="mr-3">
                                                <v-img v-if="order.user.avatar != null"
                                                    :src="'/storage/'+order.user.avatar"
                                                    :lazy-src="'/storage/'+order.user.avatar" alt="random image">

                                                    <v-layout slot="placeholder" fill-height align-center justify-center
                                                        ma-0>
                                                        <v-progress-circular indeterminate color="grey lighten-5">
                                                        </v-progress-circular>
                                                    </v-layout>

                                                </v-img>
                                            </v-avatar>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>{{ order.title }}</v-list-tile-title>
                                            <v-list-tile-sub-title class="text--primary">{{ order.body }}
                                            </v-list-tile-sub-title>
                                            <v-list-tile-sub-title v-if="user.job == 1">{{ order.user.name }}
                                            </v-list-tile-sub-title>
                                            <v-list-tile-sub-title v-else>Client: <span class="primary--text">{{ order.user.name }}</span>
                                            </v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-spacer></v-spacer>
                                    <v-list-tile v-if="order.status != 2 && order.status != 1 && user.id == order.user.id">
                                        <v-list-tile-action class="text-xs-right">
                                            <v-btn class="button-shadow red white--text"
                                                @click="acceptRequest(order.id, 2)" :disabled="loadingDialog"
                                                :loading="loadingDialog" flat>
                                                Declined
                                            </v-btn>
                                        </v-list-tile-action>
                                    </v-list-tile>

                                </v-list-tile>
                            </v-slide-x-transition>
                        </v-list>
                        <v-divider></v-divider>
                        <v-subheader>Reviews</v-subheader>

                        <v-container style="max-width: 600px;">
                            <v-timeline dense clipped>
                                <v-timeline-item v-if="loggedIn" fill-dot class="white--text mb-5" color="orange" large>
                                    <template v-slot:icon>
                                        <v-avatar size="64" class="mr-3">
                                            <!-- <v-img :src="'/storage/'+$auth.user.user.avatar"
                                                :lazy-src="'/storage/'+$auth.user.user.email" alt="random image">

                                                <v-layout slot="placeholder" fill-height align-center justify-center
                                                    ma-0>
                                                    <v-progress-circular indeterminate color="grey lighten-5">
                                                    </v-progress-circular>
                                                </v-layout>

                                            </v-img> -->
                                        </v-avatar>
                                    </template>
                                    <h3 class="title greyd1--text">Comment And Rate</h3>
                                    <v-rating v-model="rating" background-color="grey lighten-1" color="primary" medium>
                                    </v-rating>
                                    <v-text-field v-model="input" hide-details flat label="Leave a comment..." solo
                                        @keydown.enter="comment">
                                        <template v-slot:append>
                                            <v-btn class="mx-0" @click="comment" :disabled="loadingDialog"
                                                :loading="loadingDialog">
                                                Post
                                            </v-btn>
                                            <v-dialog v-model="loadingDialog" hide-overlay persistent width="300">
                                                <v-card color="dark" dark>
                                                    <v-card-text>
                                                        Please stand by
                                                        <v-progress-linear indeterminate color="white" class="mb-0">
                                                        </v-progress-linear>
                                                    </v-card-text>
                                                </v-card>
                                            </v-dialog>
                                        </template>
                                    </v-text-field>
                                </v-timeline-item>

                                <v-timeline-item v-if="!loggedIn" fill-dot class="mb-5" color="orange" small>
                                    <v-layout justify-space-between style="align-items: center;">
                                        <v-flex xs7>
                                            Please Log In for enter your comment
                                        </v-flex>
                                        <v-flex xs5 text-xs-right>
                                            <v-btn class="mx-0" router to="/login">
                                                Log In
                                            </v-btn>
                                        </v-flex>
                                    </v-layout>
                                </v-timeline-item>

                                <v-slide-x-transition group>
                                    <v-timeline-item v-for="comment in timeline" :key="comment.id" class="mb-3"
                                        color="indigo" small>
                                        <template v-slot:icon>

                                        </template>
                                        <v-layout justify-space-between>
                                            <v-flex xs7>
                                                <v-chip class="white--text ml-0" color="purple" label small>
                                                    {{ comment.user_send.name }}
                                                </v-chip>
                                                <p>{{comment.body}}</p>
                                                <v-rating v-if="comment.rating" v-model="comment.rating" small
                                                    background-color="grey lighten-1" readonly color="primary" medium>
                                                </v-rating>
                                            </v-flex>
                                            <v-flex xs5 text-xs-right>{{ comment.created_at }}</v-flex>
                                        </v-layout>
                                    </v-timeline-item>
                                </v-slide-x-transition>

                                <!-- <v-timeline-item class="mb-3" small v-for="comment in item.receive_comments"
                                    :key="comment.id">
                                    <v-layout justify-space-between>
                                        <v-flex xs7>
                                            <v-chip class="white--text ml-0" color="purple" label small>
                                                {{ comment.user_send.name }}
                                            </v-chip>
                                            <p>{{comment.body}}</p>
                                        </v-flex>
                                        <v-flex xs5 text-xs-right>{{ comment.created_at }}</v-flex>
                                    </v-layout>
                                </v-timeline-item> -->
                            </v-timeline>
                        </v-container>
                    </v-card-text>

                    <div style="flex: 1 1 auto;"></div>
                </v-card>
            </v-dialog>
            <v-dialog v-model="dialog2" max-width="500px">
                <v-card>
                    <template v-slot:activator="{ on }">
                        <v-btn color="primary" dark v-on="on">Open Dialog</v-btn>
                    </template>
                    <v-card>
                        <v-card-title>
                            <span class="headline">User Profile</span>
                        </v-card-title>
                        <v-card-text>
                            <v-container grid-list-md>
                                <v-layout wrap>
                                    <v-flex xs12>
                                        <v-text-field v-model="requestForm.title" label="Title" color="deep-purple" flat
                                            box required></v-text-field>
                                    </v-flex>
                                    <v-flex xs12>
                                        <v-textarea v-model="requestForm.body" auto-grow color="deep-purple" flat box
                                            label="Body" required rows="1"></v-textarea>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn @click="agreement = false, dialog2 = false">
                                No
                            </v-btn>
                            <v-btn class="white--text" color="deep-purple accent-4" @click="request">
                                Yes
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-card>
            </v-dialog>
        </v-layout>
    </div>
</template>

<script>
    import {
        request
    } from 'http';
    export default {
        props: ['item'],
        data() {
            return {
                dialog: false,
                dialog2: false,
                input: null,
                snackbar: false,
                rating: null,
                user: {},
                loadingDialog: false,
                requestForm: {
                    title: '',
                    body: '',
                    worker_id: this.item.id,
                },
                successMessage: '',
            }
        },
        computed: {
            timeline() {
                return this.item.receive_comments.slice().reverse()
            },
            orders() {
                return this.item.worker_orders.slice().reverse()
            },
            loggedIn() {
                return this.$store.getters.loggedIn
            }
        },
        mounted() {
            this.retrieveUser()
        },
        methods: {
            comment() {
                this.loadingDialog = true
                setTimeout(() => {
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$store.state.token
                    axios.post('/review-web', {
                            body: this.input,
                            user_id: this.item.id,
                            rating: this.rating

                        })
                        .then(response => {
                            this.snackbar = true
                            this.successMessage = response.data.success_message
                            this.$emit('workers')
                            this.loadingDialog = false
                        })
                        .catch(error => {
                            console.log(error)
                            this.loadingDialog = false
                        })

                    this.input = null
                }, 1000);
            },
            request() {
                const params = {
                    ...this.requestForm
                }
                this.loadingDialog = true
                setTimeout(() => {
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$store.state.token
                    axios.post('/order-web', params)
                        .then(response => {
                            this.snackbar = true
                            this.dialog2 = false
                            this.loadingDialog = false
                            this.successMessage = 'Your request has been sent'
                            this.$emit('workers')
                            this.dialog = true
                        })
                        .catch(error => {
                            console.log(error)
                            this.loadingDialog = false
                        })

                    this.requestForm.title = ''
                    this.requestForm.body = ''
                }, 1000);
            },
            retrieveUser() {
                this.$store.dispatch('retrieveUser')
                    .then(response => {
                        this.user = response.data.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            acceptRequest(order, status) {
                this.loadingDialog = true
                setTimeout(() => {
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$store.state.token
                    if (this.loggedIn) {
                        axios.post('/accept-order', {
                            status: status,
                            order_id: order
                        })
                        .then(response => {
                            this.snackbar = true
                            this.dialog2 = false
                            this.loadingDialog = false
                            this.successMessage = response.data.message
                            this.$emit('workers')
                            this.userRet()
                        })
                        .catch(error => {
                            console.log(error)
                            this.loadingDialog = false
                        })
                    }
                }, 1000);
            },
        }
    }

</script>
