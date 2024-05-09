<template>
    <v-row class="my-4">
        <v-col cols="12" md="4" v-for="consultant in consultants" :key="consultant" >
            <v-card
                class="mx-auto px-5 py-5 rounded-lg"
                color="#c73537"
                elevation="10"
            >
                <div class="d-flex justify-between cursor-pointer" @click="loadConsultant(consultant)">
                    <v-badge color="success" dot></v-badge>
                    <v-avatar size="100" class="">
                        <v-img
                            class="flex-grow-0"
                            height="125px"
                            :src="consultant.display_pic ? `/storage/${consultant.display_pic}` :`/assets/images/dummy.jpg`"
                            style="flex-basis: 125px"
                            contain
                        ></v-img>
                    </v-avatar>
                    <v-card-title class="flex-grow-1 flex-column align-start">
                        <div class="text-h6">{{consultant.first_name }}</div>

                        <!-- <div class="text-h6 font-weight-thin">
                            <v-chip class="my-2">Free</v-chip>
                        </div> -->
                        <v-card-subtitle class="font-weight-thin text-capitalize"
                            ><span v-for="(category, index) in consultant.astrology_categories" :key="index">
                                {{ category.name}}{{ index+1 < consultant.astrology_categories.length ? ', ' : '' }}
                            </span>
                            </v-card-subtitle
                        >
                        <v-card-subtitle class="font-weight-thin text-capitalize"
                            >{{ parseLanguages(consultant.languages_spoken) }}</v-card-subtitle
                        >
                        <!-- <v-card-subtitle class="font-weight-thin"></v-card-subtitle> -->
                    </v-card-title>
                </div>
            
                <v-divider></v-divider>

                <v-card-actions >
                    <!-- <v-chip class="mx-2">
                    <v-btn color="white" class="font-weight-thin text-capitalize px-0 rounded-pill">
                        <v-icon icon="mdi-phone-in-talk-outline" start></v-icon>
                        Call Now
                    </v-btn>
                    </v-chip> -->
                    <v-chip>
                    <v-btn color="white" class="font-weight-thin text-capitalize px-0 rounded-pill">
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
                        :readonly="true"
                    ></v-rating>
                    <span class="text-grey-lighten-2 text-caption me-2">
                        ({{ consultant.rating }})
                    </span>
                </v-card-actions>
            </v-card>
        </v-col>
    </v-row>
</template>

<script>
export default {
    props : {
        consultants  :{
            type: [Object, Array],
            required : false,
        }
    },
    data: () => ({
        rating: 4.7,

    }),
    methods: {
        parseLanguages(languages_spoken){
            const langs = JSON.parse(languages_spoken);
            let langsStr = '';
             //todo very bad way of handling the language and showing them. need to find a better way.
            langs.forEach((element, index) => {
                langsStr = langsStr + ` ${element}`  ;
                if(index < langs.length-1 ){
                    langsStr = langsStr + ',' 
                }
            });
            return langsStr;
        },
        loadConsultant(consultant) {
            window.location.href=`/consultants/${consultant.id}`
        },
        // parseCategories(categories){
        //     const size = categories.length;

        //     for (category, index in categories) {

        //     }
        // }
    },
    mounted() {
        console.log(this.consultants);
    },
};
</script>
