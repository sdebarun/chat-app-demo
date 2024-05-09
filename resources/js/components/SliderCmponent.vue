<template>
    <v-container class="py-2 px-0" :fluid="true">
        <v-row no-gutters>
            <v-carousel class="rounded-lg pa-2" :cycle="true" show-arrows="hover" :hide-delimiter-background="true" :hide-delimiters="true" :height="$vuetify.display.mobile ? 250 : 500" >
                <v-carousel-item
                    src="/assets/images/slide1.jpg"
                    cover
                ></v-carousel-item>

                <v-carousel-item
                    src="/assets/images/slider2.jpg"
                    cover
                ></v-carousel-item>

                <v-carousel-item
                    src="/assets/images/slider3.jpg"
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
