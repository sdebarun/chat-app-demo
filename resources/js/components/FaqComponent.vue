<template>
    <v-row class="mt-3">
        
        <v-col cols="12" md="12">
                    
                <v-card-title class="text-center font-family-philosopher"
                    >Frequently Asked Questions</v-card-title>
                    <v-divider></v-divider>
                <v-expansion-panels class="my-4" variant="inset">
                    <v-expansion-panel
                        v-for="faq in faqs"
                        :key="faq"
                        :text="faq.answer"
                        :title="faq.question"
                        collapse-icon="mdi-minus"
                        expand-icon="mdi-plus"
                        class="my-2 py-1 text-primary"
                        elevation=2
                        :focusable="false"
                    ></v-expansion-panel>
                </v-expansion-panels>
           
        </v-col>
    </v-row>
</template>

<script>
export default {
    data() {
        return {
            faqs: [
                {
                    question: "What is Vuetify?",
                    answer: "Vuetify is a Material Design component framework for Vue.js.",
                },
                {
                    question: "How do I install Vuetify?",
                    answer: "You can install Vuetify via npm or yarn: npm install vuetify or yarn add vuetify.",
                },
                {
                    question: "What is Vuetify?",
                    answer: "Vuetify is a Material Design component framework for Vue.js.",
                },
                {
                    question: "How do I install Vuetify?",
                    answer: "You can install Vuetify via npm or yarn: npm install vuetify or yarn add vuetify.",
                },
            ],
        };
    },
};
</script>

<style scoped>
:deep(.v-expansion-panel-title){
    background-color: white;
    font-weight: bold;
}
</style>
