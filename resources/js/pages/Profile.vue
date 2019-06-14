<template>
    <v-container fill-height fluid grid-list-xl>

        <v-layout justify-center wrap>
            <v-flex xs12 md12>
                <v-parallax height="300" src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"></v-parallax>
                <material-card class="v-card-profile">
                    <v-avatar slot="offset" class="mx-auto d-block" size="256">
                        <v-img class="avatar-profile" :src="'/storage/'+user.avatar" :lazy-src="'/storage/'+user.avatar"
                            alt="Avatar Profile">

                            <v-layout slot="placeholder" fill-height align-center justify-center ma-0>
                                <v-progress-circular indeterminate color="grey lighten-5">
                                </v-progress-circular>
                            </v-layout>
                        </v-img>
                    </v-avatar>
                    <v-card-text class="text-xs-center" style="margin-top: -130px">
                        <h3 class="display-1 font-weight-bold text-gray mb-3">{{ user.name }}</h3>
                        <span color="greyd1--text">{{ user.phone }}</span>
                    </v-card-text>
                </material-card>
                <v-divider></v-divider>
                <v-container fluid class="px-5">
                    <v-card flat>
                        <v-card-text>
                            <v-list>
                                <v-subheader>User Info</v-subheader>
                                <v-list-tile avatar>
                                    <v-list-tile-content>
                                        <v-list-tile-title>Name: <span class="primary--text title pr-1"
                                                style="vertical-align: inherit;">{{ user.name }}</span>
                                            ({{ user.email }})</v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile avatar>
                                    <v-list-tile-content>
                                        <v-list-tile-sub-title>Phone: <span class="black--text"
                                                style="vertical-align: inherit;">{{user.phone}}</span>
                                        </v-list-tile-sub-title>
                                        <v-list-tile-sub-title>Gender: <span class="black--text"
                                                style="vertical-align: inherit;">{{user.gender == 1 ? 'Male' : 'Female' }}</span>
                                            / Age: <span class="black--text"
                                                style="vertical-align: inherit;">{{user.age}}</span>
                                        </v-list-tile-sub-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile avatar class="py-3" v-if="user.job == 1">
                                    <v-list-tile-content>
                                        <v-list-tile-title>Price</v-list-tile-title>
                                        <v-list-tile-sub-title>{{user.workers.price}}
                                        </v-list-tile-sub-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile avatar class="py-3" v-if="user.job == 1">
                                    <v-list-tile-content>
                                        <v-list-tile-title>Experience</v-list-tile-title>
                                        <v-list-tile-sub-title><span
                                                style="display:none">{{ experience = parseInt(user.workers.experience) }}</span>
                                            <v-rating v-model="experience" background-color="grey lighten-1"
                                                :full-icon="'mdi-heart'" :half-icon="'mdi-heart-half-full'"
                                                :readonly="true" color="primary" medium></v-rating>
                                        </v-list-tile-sub-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                            </v-list>
                            <v-divider></v-divider>
                            <v-list three-line subheader>
                                <v-subheader>Orders</v-subheader>
                                <v-slide-x-transition group>
                                    <v-list-tile avatar v-for="(order, index) in orders" :key="index" ripple>
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

                                                        <v-layout slot="placeholder" fill-height align-center
                                                            justify-center ma-0>
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
                                                <v-list-tile-sub-title v-if="user.job == 1">{{ order.user.name }}</v-list-tile-sub-title>
                                                <v-list-tile-sub-title v-else>Worker: {{ order.worker.name }}</v-list-tile-sub-title>
                                            </v-list-tile-content>
                                        </v-list-tile>
                                        <v-spacer></v-spacer>
                                        <v-list-tile v-if="order.status != 1 && order.status != 2 && user.job == 1">
                                            <v-list-tile-action class="text-xs-right">
                                                <v-btn class="button-shadow" @click="acceptRequest(order.id, 1)"
                                                    :disabled="loadingDialog" :loading="loadingDialog" flat>
                                                    Accept
                                                </v-btn>
                                            </v-list-tile-action>
                                        </v-list-tile>
                                        <v-list-tile v-if="order.status != 2 && order.status != 1 && user.job == 1">
                                            <v-list-tile-action class="text-xs-right">
                                                <v-btn class="button-shadow red white--text"
                                                    @click="acceptRequest(order.id, 2)" :disabled="loadingDialog"
                                                    :loading="loadingDialog" flat>
                                                    Declined
                                                </v-btn>
                                            </v-list-tile-action>
                                        </v-list-tile>
                                        <v-list-tile v-if="!order.is_done && order.status == 1 && user.job == 1">
                                            <v-list-tile-action class="text-xs-right">
                                                <v-btn class="button-shadow green white--text"
                                                    @click="doneRequest(order.id, 1)" :disabled="loadingDialog"
                                                    :loading="loadingDialog" flat>
                                                    Is Done
                                                </v-btn>
                                            </v-list-tile-action>
                                        </v-list-tile>
                                    </v-list-tile>
                                </v-slide-x-transition>
                            </v-list>
                            <v-dialog v-model="loadingDialog" hide-overlay persistent width="300">
                                <v-card color="dark" dark>
                                    <v-card-text>
                                        Please stand by
                                        <v-progress-linear indeterminate color="white" class="mb-0">
                                        </v-progress-linear>
                                    </v-card-text>
                                </v-card>
                            </v-dialog>
                            <v-divider></v-divider>
                            <v-subheader v-if="user.receive_comments">Reviews</v-subheader>
                            <v-container style="max-width: 600px;">
                                <v-timeline dense clipped>
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

                                    <v-slide-x-transition group v-if="user.job == 1">
                                        <v-timeline-item v-for="comment in timeline" :key="comment.id" class="mb-3"
                                            color="indigo" small>
                                            <template v-slot:icon>

                                            </template>
                                            <v-layout justify-space-between>
                                                <v-flex xs7>
                                                    <v-chip class="white--text ml-0" color="purple" label small>
                                                        From: {{ comment.user_send.name }}
                                                    </v-chip>
                                                    <p>{{comment.body}}</p>
                                                    <v-rating v-if="comment.rating" v-model="comment.rating" small
                                                        background-color="grey lighten-1" readonly color="primary"
                                                        medium>
                                                    </v-rating>
                                                </v-flex>
                                                <v-flex xs5 text-xs-right>{{ comment.created_at }}</v-flex>
                                            </v-layout>
                                        </v-timeline-item>
                                    </v-slide-x-transition>

                                    <v-slide-x-transition group v-else>
                                        <v-timeline-item v-for="comment in timelineClient" :key="comment.id" class="mb-3"
                                            color="indigo" small>
                                            <template v-slot:icon>

                                            </template>
                                            <v-layout justify-space-between>
                                                <v-flex xs7>
                                                    <v-chip class="white--text ml-0" color="purple" label small>
                                                        To: {{ comment.user.name }}
                                                    </v-chip>
                                                    <p>{{comment.body}}</p>
                                                    <v-rating v-if="comment.rating" v-model="comment.rating" small
                                                        background-color="grey lighten-1" readonly color="primary"
                                                        medium>
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
                </v-container>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    export default {
        data() {
            return {
                user: {
                    worker_orders: [],
                    client_orders: [],
                    receive_comments: [],
                    send_comments: []
                },
                successMessage: '',
                loadingDialog: false,
            }
        },
        computed: {
            timeline() {
                if (this.user.receive_comments && this.user.job == 1) {
                    return this.user.receive_comments.slice().reverse()
                }
            },
            timelineClient() {
                if (this.user.send_comments && this.user.job == 0) {
                    return this.user.send_comments.slice().reverse()
                }
            },
            loggedIn() {
                return this.$store.getters.loggedIn
            },
            orders() {
                if (this.user.job == 1) {
                    return  this.user.worker_orders.slice().reverse()
                } else {
                    return  this.user.client_orders.slice().reverse()
                }
            },
        },
        mounted() {
            this.userRet()
        },
        methods: {
            userRet() {
                if (this.loggedIn) {

                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$store.state.token
                    axios.get('/user-web')
                        .then(response => {
                            this.user = response.data.data
                        })
                        .catch(error => {

                        })
                }
            },
            acceptRequest(order, status) {
                this.loadingDialog = true
                setTimeout(() => {
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$store.state.token
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
                }, 1000);
            },
            doneRequest(order, done) {
                this.loadingDialog = true
                setTimeout(() => {
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$store.state.token
                    axios.post('/update-order', {
                            is_done: done,
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
                }, 1000);
            },
        }
    }

</script>
<style>
    .avatar-profile {
        position: absolute;
        bottom: 145px;
        left: 0;
        -webkit-box-shadow: 5px 9px 13px 0px rgba(140, 140, 140, 0.65);
        box-shadow: 5px 9px 13px 0px rgba(140, 140, 140, 0.65);
        border: 4px solid #fff;
    }

</style>
