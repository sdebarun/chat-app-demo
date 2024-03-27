<template>
    <!-- Display an input field and a send button. -->
    <div class="input-group">
        <input
            id="btn-input"
            type="text"
            name="message"
            class="form-control input-sm"
            placeholder="Type your message here..."
            v-model="newMessage"
            @keyup.enter="sendMessage"
        />

        <span class="input-group-btn">
            <button
                class="btn btn-primary btn-sm"
                id="btn-chat"
                @click="sendMessage(newMessage)"
            >
                Send
            </button>
        </span>
    </div>
</template>
<script>
export default {
    //Takes the "user" props from <chat-form> … :user="{{ Auth::user() }}"></chat-form> in the parent chat.blade.php.
    props: ["user"],
    emits: ["messagesent"],
    data() {
        return {
            newMessage: "",
        };
    },
    methods: {
        sendMessage(message) {
            console.log(message);
            //Emit a "messagesent" event including the user who sent the message along with the message content
            this.$emit("messagesent", message);
            //Clear the input
            window.axios
                .post("/messages", { message: message })
                .then((response) => {
                    console.log(response.data);
                });
            this.newMessage = "";
        },
    },
};
</script>
