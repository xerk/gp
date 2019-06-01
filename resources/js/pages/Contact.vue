<template>
    <v-layout class="mt-5">
        <v-card class="mx-auto" style="min-width: 800px; max-width: 1000px">
            <v-toolbar color="primary accent-4" cards dark flat>
                <v-btn icon>
                    <v-icon>mdi-arrow-left</v-icon>
                </v-btn>
                <v-card-title class="title font-weight-regular">Contact us</v-card-title>
                <v-spacer></v-spacer>
                <v-btn icon>
                    <v-icon>mdi-magnify</v-icon>
                </v-btn>
                <v-btn icon>
                    <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>
            </v-toolbar>
            <v-form ref="form" v-model="form" class="pa-3 pt-4">
                <v-text-field v-model="name" :rules="[rules.required, rules.length(3)]" outline color="primary"
                    counter="50" label="Name" style="min-height: 96px" type="text"></v-text-field>
                <v-text-field v-model="phone" outline color="primary" label="Phone number" mask="phone"></v-text-field>
                <v-text-field v-model="email" :rules="[rules.email]" outline color="primary" label="Email address"
                    type="email"></v-text-field>
                <v-textarea v-model="message" auto-grow outline color="primary" label="Message" rows="1"></v-textarea>
                <v-checkbox v-model="agreement" :rules="[rules.required]" color="primary">
                    <template v-slot:label>
                        I agree to the&nbsp;
                        <a href="#" @click.stop.prevent="dialog = true">Terms of Service</a>
                        &nbsp;and&nbsp;
                        <a href="#" @click.stop.prevent="dialog = true">Privacy Policy</a>*
                    </template>
                </v-checkbox>
            </v-form>
            <v-divider></v-divider>
            <v-card-actions>
                <v-btn flat @click="$refs.form.reset()">
                    Clear
                </v-btn>
                <v-spacer></v-spacer>
                <v-btn :disabled="!form" :loading="isLoading" class="white--text" color="primary accent-4"
                    depressed>Submit</v-btn>
            </v-card-actions>
            <v-dialog v-model="dialog" absolute max-width="400" persistent>
                <v-card>
                    <v-card-title class="headline grey lighten-3">Legal</v-card-title>
                    <v-card-text>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-btn flat @click="agreement = false, dialog = false">
                            No
                        </v-btn>
                        <v-spacer></v-spacer>
                        <v-btn class="white--text" color="primary accent-4"
                            @click="agreement = true, dialog = false">
                            Yes
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-card>
    </v-layout>
</template>

<script>
    export default {
        data: () => ({
            agreement: false,
            message: '',
            dialog: false,
            email: undefined,
            form: false,
            isLoading: false,
            name: undefined,
            phone: undefined,
            rules: {
                email: v => (v || '').match(/@/) || 'Please enter a valid email',
                length: len => v => (v || '').length >= len || `Invalid character length, required ${len}`,
                required: v => !!v || 'This field is required'
            }
        })
    }

</script>
