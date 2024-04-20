<template>
    <v-container class="bg-surface-variant mb-0" fluid>
        <v-row
            align="center"
            style="height: 150px"
            no-gutters
            class="px-5 mx-5"
        >
            <v-col cols="12">
                <h5>What is Lorem Ipsum?</h5>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a
                    type specimen book. It has survived not only five centuries,
                    but also the leap into electronic typesetting, remaining
                    essentially unchanged. It was popularised in the 1960s with
                    the release of Letraset sheets containing Lorem Ipsum
                    passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </v-col>
            <v-col md="3">
                <h4>Section 1</h4>
            </v-col>
            <v-col md="3">
                <h4>Section 2</h4>
            </v-col>
            <v-col md="3">
                <h4>Section 3</h4>
            </v-col>
            <v-col md="3">
                <h4>Section 4</h4>
            </v-col>
        </v-row>
        <div class="text-center">
            <a
                :href="social.link"
                target="_blank"
                v-for="social in socials"
                :key="social"
            >
                <v-icon
                    class="ma-5 pa-5"
                    color="white"
                    :icon="social.icon"
                    size="30"
                    variant="text"
                ></v-icon>
            </a>
        </div>
        <div class="text-center"><v-icon icon="mdi-copyright" size=15></v-icon> {{ new Date().getFullYear() }} — <strong>Debarun Saha</strong></div>
    </v-container>  
</template>

<script>
export default {
    data: () => ({
        socials: [
            {
                icon: "mdi-facebook",
                link: "facebook.com",
            },
            {
                icon: "mdi-twitter",
                link: "twitter.com",
            },
            {
                icon: "mdi-linkedin",
                link: "linkedin.com",
            },
            {
                icon: "mdi-instagram",
                link: "instagram.com",
            },
        ],
    }),
    mounted() {
        console.log("Footer Mounted");
    },
};
</script>

<style></style>
