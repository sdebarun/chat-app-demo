<template>
    <v-row class="my-4">
        <v-col cols="12" md="4" v-for="num in 6" :key="num">
            <v-card
                class="mx-auto px-5 py-5 rounded-lg"
                color="consultantBg"
                elevation="10"
            >
                <div class="d-flex justify-between">
                    <v-badge color="success" dot></v-badge>
                    <v-avatar size="100">
                        <v-img
                            class="flex-grow-0"
                            height="125px"
                            src="https://cdn.vuetifyjs.com/images/cards/halcyon.png"
                            style="flex-basis: 125px"
                            contain
                        ></v-img>
                    </v-avatar>
                    <v-card-title class="flex-grow-1 flex-column align-start">
                        <div class="text-h6">Debarun Saha</div>

                        <!-- <div class="text-h6 font-weight-thin">
                            <v-chip class="my-2">Free</v-chip>
                        </div> -->
                        <v-card-subtitle class="font-weight-thin"
                            >Physics, Chemistry, Math</v-card-subtitle
                        >
                        <v-card-subtitle class="font-weight-thin"
                            >English, Bengali</v-card-subtitle
                        >
                    </v-card-title>
                </div>

                <v-divider></v-divider>

                <v-card-actions >
                    <v-chip class="mx-2">
                    <v-btn color="white" class="font-weight-thin text-capitalize px-0">
                        <v-icon icon="mdi-phone-in-talk-outline" start></v-icon>
                        Call Now
                    </v-btn>
                    </v-chip>
                    <v-chip>
                    <v-btn color="white" class="font-weight-thin text-capitalize px-0">
                        <v-icon icon="mdi-forum-outline" start></v-icon>
                        Chat Now
                    </v-btn>
                    </v-chip>

                    <v-spacer></v-spacer>

                    <v-rating
                        v-model="rating"
                        active-color="yellow-accent-4"
                        color="white"
                        size="30"
                        length="1"
                        readonly=true
                    ></v-rating>
                    <span class="text-grey-lighten-2 text-caption me-2">
                        ({{ rating }})
                    </span>
                </v-card-actions>
            </v-card>
        </v-col>
    </v-row>
</template>

<script>
export default {
    data: () => ({
        rating: 4.7,
    }),
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
