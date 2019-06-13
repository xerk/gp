<template>
    <v-content class="pa-0">
        <v-layout row wrap align-center class="text-xs-center pt-5 mt-3">
            <v-container>
                <v-avatar color="indigo" size="128">
                   <img v-if="category"
                        :src="'/storage/'+category.image"
                        :alt="category.name"
                    >
                </v-avatar>
                <h1 class="font-weight-medium display-3 greyd4--text">{{ category.name }}</h1>
                <p class="subheading" v-if="category">Workers</p>
            </v-container>
        </v-layout>
        <v-container fluid class="mt-3 mb-0">
            <v-layout wrap align-center justify-center row fill-height class="my-0">
                <v-flex xs12 md10 class="my-0">
                    <v-card>
                        <v-card-title>
                            Workers of <span class="primary--text ml-1 title">{{ category.name }}</span>
                            <v-spacer></v-spacer>
                            <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details>
                            </v-text-field>
                        </v-card-title>
                        <v-data-table :headers="headers" :items="workers" :search="search">
                            <template v-slot:items="props">
                                <td>
                                    <v-avatar size="64" class="mr-3 my-2">
                                        <v-img v-if="category" :src="'/storage/'+props.item.avatar" :lazy-src="'/'+props.item.avatar" alt="random image">

                                            <v-layout slot="placeholder" fill-height align-center justify-center ma-0>
                                                <v-progress-circular indeterminate color="grey lighten-5">
                                                </v-progress-circular>
                                            </v-layout>
                                        </v-img>
                                    </v-avatar><span class="title">{{ props.item.name }}</span>
                                </td>
                                <td class="text-xs-right">{{ props.item.name }}</td>
                                <td class="text-xs-right"><span class="red--text subheading" style="vertical-align: inherit;">{{ props.item.workers.price }}</span> per hour(s)</td>
                                <td class="text-xs-right">
                                    <span style="display:none">{{ experience = parseInt(props.item.workers.experience) }}</span>
                                    <v-rating v-model="experience" background-color="grey lighten-1" readonly :empty-icon="'mdi-heart-outline'" :full-icon="'mdi-heart'" :half-icon="'mdi-heart-half-full'"
                                        color="red" medium></v-rating>
                                </td>
                                <td class="text-xs-right">
                                    <span style="display:none">{{ rating = parseFloat(props.item.sum_rating / props.item.count_rating) }}</span>
                                    <v-rating v-model="rating" half-increments  :readonly="true" background-color="grey lighten-1"
                                        color="red" medium></v-rating>
                                </td>
                                <td class="text-xs-right">
                                    <Request :item="props.item" @workers="retrieveWorkers"></Request>
                                </td>
                            </template>
                            <template v-slot:no-results>
                                <v-alert :value="true" color="error" icon="warning">
                                    Your search for "{{ search }}" found no results.
                                </v-alert>
                            </template>
                        </v-data-table>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
    </v-content>

</template>

<script>
import Request from '@/components/worker/Request'
    export default {
        props: ['id'],
        components: {
            Request,
        },
        data() {
            return {
                search: '',
                rating: 4,
                headers: [{
                        text: 'Name',
                        align: 'left',
                        sortable: false,
                        value: 'name'
                    },
                    {
                        text: 'Review',
                        align: 'center',
                        value: 'review'
                    },
                    {
                        text: 'Price',
                        align: 'center',
                        value: 'price'
                    },
                    {
                        text: 'Experience',
                        align: 'center',
                        value: 'experience'
                    },
                    {
                        text: 'Rating',
                        align: 'center',
                        value: 'rating'
                    },
                    {
                        text: 'Action',
                        align: 'center',
                        value: 'action'
                    },
                ],
                desserts: [],
                category: {},
                workers: [],
                user: {},
            }
        },
        computed: {
            workersWithOutMe() {
                let filteredStories = this.workers.filter((item) => {
                    return item.id != this.$store.state.user.id && item.job == true;
                })

                return filteredStories;
            }
        },
        mounted() {
            this.retrieveCategory()
            this.retrieveWorkers()
            this.retrieveUser()
        },
        methods: {
            retrieveCategory() {
                axios.get(`/category/${this.id}`)
                    .then(response => {
                        this.category = response.data.data
                        this.users = response.data.data.users
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            retrieveWorkers() {
                axios.get(`/workers-web?category=${this.id}`)
                    .then(response => {
                        this.workers = response.data.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
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
        }
    }

</script>
