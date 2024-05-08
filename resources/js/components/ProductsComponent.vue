<template>
    <v-container>
        <v-row>
            <v-col cols="3" v-for="product in products" :key="product" class="">
                <!-- <v-hover v-slot="{ isHovering, props }"> -->
                <v-card
                    class="mx-auto"
                    color="grey-lighten-4"
                    max-width="250"
                    
                >
                    <v-img
                        :aspect-ratio="16 / 9"
                        src="https://picsum.photos/200/300"
                        cover
                    ></v-img>

                    <v-expand-transition class="cursor-pointer">
                        <div
                            v-if="isHovering"
                            class="d-flex transition-fast-in-fast-out bg-orange-darken-2 v-card--reveal text-h2"
                            style="height: 100%"
                        >
                            <v-icon size="20" icon="mdi-eye-outline"></v-icon>
                        </div>
                    </v-expand-transition>
                    <v-card-text class="pt-6">
                        <div
                            class="font-weight-bold text-grey text-h6 mb-2 text-orange"
                        >
                            <a
                                href="#"
                                class="text-decoration-none text-orange product-name"
                                >{{ product.product_name }}</a
                            >
                        </div>
                        <div class="font-weight-light text mb-2">
                            <span
                                class="text-decoration-line-through font-weight-bold text-black"
                            >
                                Rs.{{ product.original_price }}</span
                            >
                            <span class="text-red font-weight-bold">
                                Rs.{{ product.selling_price }}</span
                            >
                            <div
                                class="text-center ma-2 pa-2 border rounded-pill cursor-pointer"
                            >
                                <v-icon
                                    size="15"
                                    icon="mdi-cart-variant"
                                ></v-icon
                                >Add to Cart
                            </div>
                        </div>
                    </v-card-text>
                </v-card>
                <!-- </v-hover> -->
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
export default {
    props: {
        limit : {
            type : Number,
            required : true,
            default : 20,
        }
    },
        
    data: () => ({
        products: [],
        loading: false,
        isHovering : false,
    }),

    methods: {
        getAllProducts() {
            window.axios
                .get("products", {
                    params: { limit: this.limit },
                })
                .then((data) => {
                    this.products = data.data.data;
                })
                .catch((err) => console.log(err))
                .finally((this.loading = false));
        },
    },

    created() {
        this.loading = true;
        this.getAllProducts();
        console.log(this.limit);
    },
};
</script>
<style>
.v-card--reveal {
    align-items: center;
    bottom: 0;
    justify-content: center;
    opacity: 0.9;
    position: absolute;
    width: 100%;
}
.product-name:hover {
    text-transform: uppercase;
}
</style>
