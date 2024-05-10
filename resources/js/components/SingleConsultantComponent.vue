<template>
    <v-container>
        <v-row>
            <v-col cols="12" md="4" class="text-center">
                <v-avatar size="300" class="border">
                    <v-img
                        class="flex-grow"
                        :src="
                            consultant.display_pic
                                ? `/storage/${consultant.display_pic}`
                                : `/assets/images/dummy.jpg`
                        "
                        style="flex-basis: 125px"
                        contain
                    ></v-img>
                </v-avatar>
                <div class="flex-grow-1 flex-column text-center pa-2 ma-3">
                    <!-- <v-btn color="primary" class="font-weight-thin text-capitalize rounded-pill mr-3">
                        <v-icon icon="mdi-phone-in-talk-outline" start></v-icon>
                        Call Now
                    </v-btn> -->

                    <v-btn
                        color="primary"
                        class="font-weight-thin text-capitalize rounded-pill ml-3"
                    >
                        <v-icon icon="mdi-forum-outline" start></v-icon>
                        Chat Now
                    </v-btn>
                </div>
            </v-col>
            <v-col md="8">
                <v-card variant="elevated" elevation=3 hover>
                    <v-card-title>{{ consultant.first_name }} {{ consultant.last_name }}</v-card-title>
                    <v-card-subtitle>
                        <v-chip
                            class="mr-1 font-weight-bold text-text0"
                            color="primary"
                            v-for="language in JSON.parse(
                                consultant.languages_spoken
                            )"
                            :key="language"
                        >
                            {{ language }}
                        </v-chip>
                    </v-card-subtitle>
                    <v-card-subtitle class="my-2"
                        ><v-chip class="px-3 font-weight-bold text-primary"
                            ><v-icon
                                color="red"
                                class="ma-2"
                                icon="mdi-theme-light-dark"
                            ></v-icon
                            >
                            <span v-for="(category, index) in consultant.astrology_categories" :key="index">
                                {{ category.name}}{{ index+1 < consultant.astrology_categories.length ? ', ' : '' }}
                            </span>
                            </v-chip
                        ></v-card-subtitle
                    >
                    <v-card-text>
                        {{consultant.about}}
                        
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
        <v-row no-gutter>
            <v-col lg="4" md="4" sm="12">
                <v-card
                    class="d-flex flex-column mx-auto py-8"
                    elevation="10"
                    height="500"
                    width="360"
                >
                    <div class="d-flex justify-center mt-auto text-h5">
                        Rating overview
                    </div>

                    <div class="d-flex align-center flex-column my-auto">
                        <div class="text-h2 mt-5">
                            3.5
                            <span class="text-h6 ml-n3">/5</span>
                        </div>

                        <v-rating
                            :model-value="3.5"
                            color="yellow-darken-3"
                            half-increments
                        ></v-rating>
                        <div class="px-3">3,360 ratings</div>
                    </div>

                    <v-list
                        bg-color="transparent"
                        class="d-flex flex-column-reverse"
                        density="compact"
                    >
                        <v-list-item v-for="(rating, i) in 5" :key="i">
                            <v-progress-linear
                                :model-value="rating * 15"
                                class="mx-n5"
                                color="yellow-darken-3"
                                height="20"
                                rounded
                            ></v-progress-linear>

                            <template v-slot:prepend>
                                <span>{{ rating }}</span>
                                <v-icon class="mx-3" icon="mdi-star"></v-icon>
                            </template>

                            <template v-slot:append>
                                <div class="rating-values">
                                    <span class="d-flex justify-end">
                                        {{ rating * 224 }}
                                    </span>
                                </div>
                            </template>
                        </v-list-item>
                    </v-list>
                </v-card>
            </v-col>
            <v-col lg="8" md="8" sm="12">
                <v-sheet class="d-flex flex-wrap pa-4" elevation="0">
                    <v-card
                        class="pa-5 my-3 w-100"
                        variant="outlined"
                        width="500"
                        v-for="i in 3"
                        :key="i"
                    >
                        <v-row class="justify-center">
                            <v-col cols="1" class="float-left" :class="$vuetify.display.smAndDown ? 'mr-4' : ''">
                                <v-avatar size="45">
                                    <v-img
                                        class="flex-grow-0"
                                        src="https://ui-avatars.com/api/?name=Debarun+Saha&background=random"
                                    ></v-img>
                                </v-avatar>
                            </v-col>
                            <v-col class="float-left"
                                ><v-rating
                                    model-value="3.8"
                                    :readonly="true"
                                    color="singleRatingColor"
                            /></v-col>
                            <v-col cols="12">
                                <h5 class="ma-0 pa-0">Awesome Grapes</h5>
                            </v-col>

                            <v-card-text class="pa-2">
                                Letraset sheets containing Lorem Ipsum passages,
                                and more recently with desktop publishing
                                software like Aldus PageMaker including versions
                                of Lorem Ipsum.
                            </v-card-text>
                        </v-row>
                    </v-card>
                </v-sheet>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
export default {
    data: () => ({
        rating: 1,
    }),
    props: {
        consultant: {
            type: [Array, Object],
            required: true,
            default: () => ({
                //
            }),
        },
    },
    methods: {},
    mounted() {
        console.log(this.consultant);
    },
};
</script>

<style lang="scss" scoped>
.rating-values {
    width: 25px;
}
</style>
