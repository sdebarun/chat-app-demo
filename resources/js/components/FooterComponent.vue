<template>
    <v-container class="bg-surface-variant mb-0 " fluid>
        <v-row
            align="center"
            no-gutters
            class="px-5 mx-5"
        >
            <v-col cols="12">
                <h5>Why Rudraganga?</h5>
                <p>
                    Based on Haridwar, Uttarakhand,we are providing on-demand astrology
prediction services. Our platform enables users to schedule sessions
with astrologers over chat and call. It provides diversified services
including astrology, tarot reading, vastu, match-making, and horoscope
reading..
                </p>
            </v-col>
            <!-- todo cols needs to be defined properly once the content is available -->
            <v-col cols="12" lg="3" md="3" sm="6"> 
                <h4>Section 1</h4>
            </v-col>
            <v-col cols="12" lg="3" md="3" sm="6">
                <h4>Section 2</h4>
            </v-col>
            <v-col cols="12" lg="3" md="3" sm="6">
                <h4>Section 3</h4>
            </v-col>
            <v-col cols="12" lg="3" md="3" sm="6">
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
                    class="ma-4 pa-4"
                    color="white"
                    :icon="social.icon"
                    size="30"
                    variant="text"
                ></v-icon>
            </a>
        </div>
        <div class="text-center"><v-icon icon="mdi-copyright" size=15></v-icon> {{ new Date().getFullYear() }} — <strong>RudraGanga</strong></div>
    </v-container>  
</template>

<script>
import '../reusables/_case.js';
import { log } from '../reusables/_case.js';
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
                icon: "mdi-pinterest",
                link: "#",
            },
            {
                icon: "mdi-instagram",
                link: "instagram.com",
            },
        ],
    }),

    mounted() {
        log
    }
};
</script>

<style></style>
