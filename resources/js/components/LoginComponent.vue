<template>
    <v-container>
        <v-row v-if="errMsg" class="justify-center">
            <v-col :cols="$vuetify.display.smAndDown ? 12 : 6">
            <v-alert
                closable
                type="error"
                v-if="errMsg"
                class="my-4"
                >{{ errMsg }}
            </v-alert>
            </v-col>
        </v-row>
        <v-row class="justify-center">
            <v-col :cols="$vuetify.display.smAndDown ? 12 : 6">
                <v-tabs v-model="tab" align-tabs="center" color="primary">
                    <v-tab :value="1">Using Email id</v-tab>
                    <v-tab :value="2">Usign Phone number</v-tab>
                </v-tabs>
                <v-window v-model="tab">
                    <v-window-item :value="1">
                        <v-container fluid>
                            <v-row>
                                <v-col>
                                    <v-text-field
                                        prepend-icon="mdi-email-outline"
                                        clearable
                                        label="Email Address"
                                        variant="underlined"
                                        v-model="email"
                                        :rules="[
                                            rules.required,
                                            rules.validEmail,
                                        ]"
                                        validate-on-blur
                                    ></v-text-field>
                                    <v-text-field
                                        prepend-icon="mdi-key-variant"
                                        clearable
                                        label="Password"
                                        variant="underlined"
                                        v-model="password"
                                        :rules="[rules.required]"
                                        validate-on-blur
                                    >
                                    </v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col class="text-center">
                                    <v-btn
                                        :disabled="!(email && password)"
                                        color="lightRed"
                                        @click="loginByEmail"
                                        :loading="loading"
                                        >Login</v-btn
                                    >
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-window-item>
                    <v-window-item :value="2">
                        <v-container fluid>
                            <v-row>
                                <v-col>
                                    <v-text-field
                                        prepend-icon="mdi-phone-outline"
                                        clearable
                                        label="Phone number"
                                        variant="underlined"
                                        v-model="phoneNumber"
                                        :rules="[
                                            rules.required,
                                            rules.validPhone,
                                        ]"
                                        validate-on-blur
                                        type="number"
                                        hide-spin-buttons
                                    ></v-text-field>
                                    <v-otp-input
                                        v-if="phoneNumber"
                                        clearable
                                        label="Enter OTP"
                                        variant="underlined"
                                        v-model="otp"
                                        :rules="[rules.required]"
                                        validate-on-blur
                                    ></v-otp-input>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col class="text-center">
                                    <v-btn
                                        color="lightRed"
                                        :disabled="!phoneNumber"
                                        @click="loginByPhoneNumber"
                                        >Login</v-btn
                                    >
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-window-item>
                </v-window>
            </v-col>
        </v-row>
        <v-row class="py-0 my-0">
            <v-col class="text-center">
                <p>
                    Not a member of the family yet ?
                    <a class="join-now-link" href="/register">Join us now</a>
                </p>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data: () => ({
        tab: null,
        email: null,
        password: null,
        phoneNumber: null,
        loading: false,
        otp: "",
        errMsg: null,
        rules: {
            required: (v) => !!v || "The filed is required",
            validEmail: (v) =>
                /.+@.+\..+/.test(v) || "Please enter a valid email",
            validPhone: (v) =>
                /^[0-9]+$/.test(v) || "Please enter a valid phone number",
        },
    }),

    computed: {},
    methods: {
        loginByEmail() {
            console.log([this.email, this.password]);
            this.loading = true;
            window.axios
                .post("/login", {
                    email: this.email,
                    password: this.password,
                })
                .then((data) => {
                    if (data.status == 204) {
                        window.location.href = "/dashboard";
                    }
                    if (data.status == 200) {
                        window.location.href = "/";
                    }
                })
                .catch((err) => {
                    console.log(err);
                    this.errMsg = err.response.data.message
                    }
                    )
                .finally(() => {
                    this.loading = false;
                });
        },
        loginByPhoneNumber() {
            console.log([this.phoneNumber, this.otp]);
        },
    },
};
</script>
<style lang="scss" scoped>
:deep(input) {
    background: transparent;
}
</style>
