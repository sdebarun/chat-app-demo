<template>
    <v-container>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <v-card class="mx-3">
                    <v-card-item>
                        <v-card-title>Chat Window</v-card-title>
                        <v-select
                            v-model="recipient_id"
                            :items="recipients"
                            label="Select recipient"
                            item-title="name"
                            item-value="value"
                            @update:modelValue="fetchChatData"
                        ></v-select>
                    </v-card-item>
                    <v-card class="pa-4 ma-3">
                        <Message
                            v-for="message in messages"
                            :key="message.id"
                            :class="['message', { right: message.isSentByMe }]"
                            :dark="message.isSentByMe ?? false"
                            :content="message.message.content"
                            :sender="message.sender"
                            :sent-at="message.created_at"
                        />

                        <ChatBox class="chat-box" @submit="sendMessage" />

                        <!-- <RegisterDialog v-if="!user" @submit="onRegister" /> -->
                    </v-card>
                </v-card>
            </div>
        </div>
    </v-container>
</template>

<script>
export default {
    data: () => ({
        messages: [],
        recipient_id: null,
        userMessage: null,
        recipients: [
            { name: "deabrun 1", value: 1 },
            { name: "debarun 2", value: 2 },
            { name: "deabrun 3", value: 3 },
        ],
    }),
    mounted() {
        this.fetchChatData();
    },

    created() {
        window.Echo.private("rg-astro-chat").listen("NewMessage", (e) => {
            this.fetchChatData();
        });
    },

    methods: {
        sendMessage(data) {
            window.axios
                .post("/messages", {
                    recipient_id: this.recipient_id,
                    message: data.text,
                })
                .then((data) => this.fetchChatData())
                .catch((err) => console.log(err));
        },
        fetchChatData() {
            if (!this.recipient_id) return;
            window.axios
                .get(`/messages?recipient_id=${this.recipient_id}`)
                .then(({ data }) => {
                    this.messages = data;
                })
                .catch((err) => console.log(err));
        },
    },
};
</script>

<style>
@font-face {
    font-family: "Georama";
    src: url("./assets/Georama.ttf");
}

@font-face {
    font-family: "Georama";
    src: url("./assets/Georama.ttf");
    font-weight: bold;
}

* {
    box-sizing: border-box;
}

html {
    font-family: "Georama", sans-serif;
}

body {
    margin: 0;
}

button {
    border: 0;
    background: #2a60ff;
    color: white;
    cursor: pointer;
    padding: 1rem;
}

input {
    border: 0;
    padding: 1rem;
    background: rgba(0, 0, 0, 0.1);
}
</style>

<style scoped>
.app {
    height: 100vh;
    display: flex;
    flex-direction: column;
}

.messages {
    flex-grow: 1;
    overflow: auto;
    padding: 1rem;
}

.message + .message {
    margin-top: 1rem;
}

.message.right {
    margin-left: auto;
}
</style>
