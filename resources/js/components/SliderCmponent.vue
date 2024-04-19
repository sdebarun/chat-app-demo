<template>
    <v-container class="py-2 px-0" :fluid="true">
        <v-row no-gutters>
            <v-carousel class="rounded-lg" :cycle="true" show-arrows="hover" :hide-delimiter-background="true" :hide-delimiters="true" :height="$vuetify.display.mobile ? 250 : 400" >
                <v-carousel-item
                    src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                    cover
                ></v-carousel-item>

                <v-carousel-item
                    src="https://cdn.vuetifyjs.com/images/cards/hotel.jpg"
                    cover
                ></v-carousel-item>

                <v-carousel-item
                    src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                    cover
                ></v-carousel-item>
            </v-carousel>
        </v-row>
    </v-container>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
