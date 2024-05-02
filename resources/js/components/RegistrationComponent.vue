<template>
    <v-container>
        <v-row v-if="showForm">
            <v-alert
                closable
                :type="errorMessage ? 'error' : 'success'"
                v-if="errorMessage"
                class="my-4"
                >{{ errorMessage }}
            </v-alert>
        </v-row>
        <v-row v-if="showForm">
            <v-col cols="12" md="6" sm="12">
                <v-text-field
                    v-model="formData.first_name"
                    label="First name"
                    validate-on-blur
                    :rules="[rules.required]"
                    variant="outlined"
                ></v-text-field>
            </v-col>
            <v-col cols="12" md="6" sm="12">
                <v-text-field
                    v-model="formData.last_name"
                    label="Last name"
                    validate-on-blur
                    :rules="[rules.required]"
                    variant="outlined"
                ></v-text-field>
            </v-col>
            <v-col cols="12" md="6" sm="12">
                <v-text-field
                    v-model="formData.email"
                    label="Email"
                    validate-on-blur
                    variant="outlined"
                    :rules="[rules.validEmail]"
                ></v-text-field>
            </v-col>
            <v-col cols="12" md="6" sm="12">
                <v-text-field
                    v-model="formData.phone_number"
                    label="Phone"
                    validate-on-blur
                    variant="outlined"
                    :rules="[rules.required]"
                ></v-text-field>
            </v-col>
            <v-col cols="12" md="6" sm="12">
                <v-text-field
                    v-model="formData.experience"
                    label="Experience"
                    validate-on-blur
                    variant="outlined"
                    :rules="[rules.required]"
                    type="number"
                ></v-text-field>
            </v-col>
            <v-col cols="12" md="6" sm="12">
                <v-text-field
                    v-model="formData.password"
                    label="Password"
                    validate-on-blur
                    variant="outlined"
                    :rules="[rules.required]"
                ></v-text-field>
            </v-col>
            <v-col cols="12" md="6" sm="12">
                <v-text-field
                    v-model="formData.street_1"
                    label="Address line 1"
                    validate-on-blur
                    variant="outlined"
                    :rules="[rules.required]"
                ></v-text-field>
            </v-col>
            <v-col cols="12" md="6" sm="12">
                <v-text-field
                    v-model="formData.street_2"
                    label="Address line 2"
                    validate-on-blur
                    variant="outlined"
                ></v-text-field>
            </v-col>
            <v-col cols="12" md="4" sm="12">
                <v-text-field
                    v-model="formData.pincode"
                    label="Pincode"
                    validate-on-blur
                    variant="outlined"
                    :rules="[rules.required]"
                ></v-text-field>
            </v-col>
            <v-col cols="6" md="4" sm="6">
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
            <v-col cols="6" md="4" sm="6">
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
            <v-col cols="12" md="6" sm="12">
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
            <v-col cols="12" md="6" sm="12">
                <v-select
                    v-model="formData.categories"
                    :items="categories"
                    item-title="name"
                    item-value="id"
                    label="Categories"
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

                <!-- <v-btn
                    class="ma-2 text-capitalize"
                    color="warning"
                    @click="clearInputs()"
                >
                    Clear
                </v-btn> -->
            </v-col>
        </v-row>
        <v-row v-if="success">
            <registration-success />
        </v-row>
    </v-container>
</template>

<script>
import RegistrationSuccess from "./RegistrationSuccess.vue";
export default {
    components: { RegistrationSuccess },
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
            { name: "India", id: 101 },
        ],
        states: [],
        languages: ["Bengali", "English", "Hindi"],
        categories: [],
        showForm: true,
        success: false,
    }),

    methods: {
        getCategories() {
            window.axios
                .get("all-categories")
                .then((data) => {
                    this.categories = data.data;
                })
                .catch((err) => console.log(err));
        },

        submitForm() {
            console.log(this.formData);
            window.axios
                .post("/register-as-consultant", this.formData)
                .then((data) => {
                    if (data.status) {
                        this.showForm = false;
                        this.success = true;
                    }
                })
                .catch((err) => {
                    if (err.response?.data?.errors) {
                        this.errors = true;
                        this.errorMessage = err.response?.data?.message;
                    }
                });
        },
        getStates(){
            window.axios.get('states').then(data => console.log(this.states = data.data)).catch(err => console.log(err));
        }
    },
    created() {
        this.getCategories();
        this.getStates();
    }
};
</script>

<style lang="scss">
input {
    background: transparent;
}
</style>
