<template>
    <v-container>
        <v-row>
            <v-alert
                closable
                :type="errorMessage ? 'error' : 'success'"
                variant=""
                v-if="errorMessage"
                class="my-4"
                >{{ errorMessage }}
            </v-alert>
        </v-row>
        <v-row>
            <v-col cols="6" md="6">
                <v-text-field
                    v-model="formData.name"
                    label="Full name"
                    validate-on-blur
                    :rules="[rules.required]"
                    variant="outlined"
                ></v-text-field>
            </v-col>
            <v-col cols="6" md="6">
                <v-text-field
                    v-model="formData.email"
                    label="Email"
                    validate-on-blur
                    variant="outlined"
                    :rules="[rules.validEmail]"
                ></v-text-field>
            </v-col>
            <v-col cols="6" md="6">
                <v-text-field
                    v-model="formData.phone_number"
                    label="Phone"
                    validate-on-blur
                    variant="outlined"
                    :rules="[rules.required]"
                ></v-text-field>
            </v-col>
            <v-col cols="6" md="6">
                <v-text-field
                    v-model="formData.password"
                    label="Password"
                    validate-on-blur
                    variant="outlined"
                    :rules="[rules.required]"
                ></v-text-field>
            </v-col>
            <v-col cols="6" md="6">
                <v-text-field
                    v-model="formData.street_1"
                    label="Address line 1"
                    validate-on-blur
                    variant="outlined"
                    :rules="[rules.required]"
                ></v-text-field>
            </v-col>
            <v-col cols="6" md="6">
                <v-text-field
                    v-model="formData.street_2"
                    label="Address line 2"
                    validate-on-blur
                    variant="outlined"
                ></v-text-field>
            </v-col>
            <v-col cols="4" md="4">
                <v-text-field
                    v-model="formData.pincode"
                    label="Pincode"
                    validate-on-blur
                    variant="outlined"
                    :rules="[rules.required]"
                ></v-text-field>
            </v-col>
            <v-col cols="4" md="4">
                <v-select
                    v-model="formData.country_id"
                    :items="countries"
                    item-title="name"
                    item-value="id"
                    label="Country"
                    clearable
                    variant="outlined"
                    validate-on-blur
                ></v-select>
            </v-col>
            <v-col cols="4" md="4">
                <v-select
                    v-model="formData.state_id"
                    :items="states"
                    item-title="name"
                    item-value="id"
                    label="State"
                    clearable
                    variant="outlined"
                    validate-on-blur
                ></v-select>
            </v-col>
            <v-col cols="4" md="4">
                <v-text-field
                    v-model="formData.experience"
                    label="Experience"
                    validate-on-blur
                    variant="outlined"
                    :rules="[rules.required]"
                    type="number"
                ></v-text-field>
            </v-col>
            <v-col cols="4" md="4">
                <v-select
                    v-model="formData.languages_spoken"
                    :items="languages"
                    label="Languages Known"
                    clearable
                    variant="outlined"
                    validate-on-blur
                    chips
                    multiple
                ></v-select>
            </v-col>
            <!-- <v-col cols="4" md="4">
                <v-file-input
                    v-model="formData.avatar"
                    clearable
                    variant="outlined"
                    :rules="[rules.avatar]"
                    accept="image/png, image/jpeg, image/bmp"
                    label="Avatar"
                    placeholder="select file"
                    validate-on-blur
                ></v-file-input>
            </v-col> -->
            <v-col cols="12" class="text-center">
                <v-btn
                    class="ma-2 text-capitalize"
                    color="primary"
                    @click="submitForm()"
                >
                    Sign up
                </v-btn>

                <v-btn
                    class="ma-2 text-capitalize"
                    color="warning"
                    @click="clearInputs()"
                >
                    Clear
                </v-btn>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data: () => ({
        errorMessage: null,
        errors: false,
        name: null,
        email: null,
        rules: {
            required: (v) => !!v || "The filed is required",
            validEmail: (v) =>
                /.+@.+\..+/.test(v) || "Please enter a valid email",

            avatar: (value) =>
                !value ||
                !value.length ||
                value[0].size < 2000000 ||
                "Avatar size should be less than 2 MB!",
        },
        formData: {
            phone_number: null,
            name: null,
            email: null,
            password: null,
            street_1: null,
            street_2: null,
            pincode: null,
            country_id: null,
            state_id: null,
            experience: null,
            languages_spoken: null,
        },

        countries: [
            { name: "India", id: 1 },
            { name: "Bangladesh", id: 2 },
        ],
        states: [
            { name: "WestBengal", id: 1 },
            { name: "Sikkim", id: 2 },
        ],
        languages: ["Bengali", "English", "Hindi"],
    }),

    methods: {
        submitForm() {
            console.log(this.formData);
        },
        clearInputs() {
            //
        },

        submitForm() {
            console.log(this.formData);
            window.axios
                .post("/registration", this.formData)
                .then((data) => {
                    console.log(data);
                })
                .catch((err) => {
                    if (err.response?.data?.errors) {
                        this.errors = true;
                        this.errorMessage = err.response?.data?.message;
                    }
                });
        },
    },
};
</script>

<style lang="scss">
.v-field__input input {
    background: transparent;
}
</style>
