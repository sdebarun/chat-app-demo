<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Chat component</div>
                       
                    <select v-model="recipient_id" @change="fetchChatData">
                        <option value>Select User</option>
                        <option value="1">Debarun 1</option>
                        <option value="2">Debarun 2</option>
                        <option value="3">Debarun 3</option>
                    </select>
                        <hr/>
                    <div class="card-body">
                        <Message
                            v-for="message in messages"
                            :key="message.id"
                            :class="['message', { right: message.isSentByMe }]"
                            :dark="message.isSentByMe"
                            :content="message.message.content"
                            :sender="message.sender"
                        />

                        <ChatBox class="chat-box" @submit="sendMessage" />

                        <!-- <RegisterDialog v-if="!user" @submit="onRegister" /> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        messages: [],
        recipient_id: null,
        userMessage: null,
    }),
    mounted() {
        this.fetchChatData();
    },

    methods: {
        sendMessage(text) {
            console.log(text);
            window.axios
                .post("/messages", {
                    recipient_id: this.recipient_id,
                    message: text,
                })
                .then((data) => console.log(data))
                .catch((err) => console.log(err));
        },
        fetchChatData() {
           if(!this.recipient_id) return;
            window.axios
                .get(`/messages?recipient_id=${this.recipient_id}`)
                .then(({ data }) => {
                    this.messages = data;
                    console.log(this.messages);
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
