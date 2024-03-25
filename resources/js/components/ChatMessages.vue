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
        //this.addMessage();
    },
    methods: {
        fetchMessages() {
            //GET request to the messages route in our Laravel server to fetch all the messages
            window.axios.get("/messages").then((response) => {
                //Save the response in the messages array to display on the chat view
                this.messages = response.data;
            });
        },
        //Receives the message that was emitted from the ChatForm Vue component
        addMessage(message) {
            //Pushes it to the messages array
            this.messages.push(message);
            //POST request to the messages route with the message data in order for our Laravel server to broadcast it.
            window.axios.post("/messages", message).then((response) => {
                console.log(response.data);
            });
        },
    },
};
</script>
