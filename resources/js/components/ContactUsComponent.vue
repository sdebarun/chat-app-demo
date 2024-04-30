<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" class="pa-0 ma-0">
                <v-img
                    :src="`/assets/images/contact-us-bg.jpg`"
                    height="350px"
                    cover
                ></v-img>
                <div class="text-center pa-4 ma-4">
                    <h3>Let's start a conversation</h3>
                    <v-divider></v-divider>
                </div>
            </v-col>

            <v-col lg="6" md="6" sm="12" class="pa-10">
                <h5 class="mb-5 text-h5">Ask how we can help you</h5>
                
                <p><v-icon icon="mdi-map-marker-outline" color="primary" start></v-icon>No. 3, Old Madras Rd, Sadanandanagar, Bennigana Halli, Bengaluru, Karnataka 560016</p>
                <p><v-icon icon="mdi-email-outline" color="primary" start></v-icon><a href="mailto:contact@gmail.com" class="text-decoration-none text-black">contact@some.com</a></p>
                <p><v-icon icon="mdi-phone-outline" color="primary" start></v-icon><a href="tel:123" class="text-decoration-none text-black">1234567890</a></p>
            </v-col>
            <v-col lg="6" md="6" sm="12" class="pa-10">
                <v-text-field
                    label="your name"
                    class="mx-2"
                    variant="outlined"
                ></v-text-field>
                <v-text-field
                    label="your email"
                    class="mx-2"
                    variant="outlined"
                ></v-text-field>
                <v-textarea
                    class="mx-2"
                    label="Message"
                    rows="5"
                    variant="outlined"
                ></v-textarea>
                <v-btn class="ma-2 text-white" color="primary">Send</v-btn>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {};
</script>
