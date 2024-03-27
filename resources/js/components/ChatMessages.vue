<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages" :key="message.id">
            <div class="clearfix">
                <div class="header">
                    <strong>
                        {{ message.user.name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>
<script>
export default {
    props: ["allMessages"],
    data() {
        return {
            messages : [],
        }
    },
    created() {
        this.fetchMessages();
    },
    methods: {
        fetchMessages() {
            //GET request to the messages route in our Laravel server to fetch all the messages
            window.axios.get("/messages").then((response) => {
                //Save the response in the messages array to display on the chat view
                this.messages = response.data;
            });
        },
    },
};
</script>
