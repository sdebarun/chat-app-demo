<template>
    <div class="chat-box">
        <input
            v-model="text"
            placeholder="Write a message"
            type="text"
            @keyup="isNotTyping"
            @keydown="isTyping"
            @keypress.enter="onSubmit()" 
            ref="messageBox"
            :class="{typing : typing}"
        />
        <button :disabled="text === ''" @click="onSubmit()">Send</button>
    </div>
</template>

<script>
export default {
    name: "ChatBox",
    data: () => ({
        text: "",
        typing: false,
    }),
    created() {
        this.listenTyping();
    },
    watch : {
      typing(newValue){
        this.$refs.messageBox.placeholder =  newValue ? "typing..." : 'Write a message';
      }
    },
    methods: {
        // We will call this when the form is submitted
        onSubmit() {
            this.$emit("submit", { text: this.text });
            this.text = "";
        },

        isTyping() {
            console.log("is typing");
            let channel = window.Echo.private("rg-astro-chat");

            setTimeout(function () {
                channel.whisper("typing", {
                    typing: true,
                });
            }, 300);
        },
        isNotTyping() {
            let channel = window.Echo.private("rg-astro-chat");

            setTimeout(function () {
                channel.whisper("typing", {
                    typing: false,
                });
            }, 3000);
        },
        listenTyping() {
            console.log("in listener");
            window.Echo.private("rg-astro-chat").listenForWhisper(
                "typing",
                (e) => {
                    console.log(e);
                    this.typing = e.typing;
                    setTimeout(function () {
                        this.typing = false;
                    }, 900);
                }
            );
        },
    },
};
</script>

<style scoped>
.chat-box {
    width: 100%;
    display: flex;
    margin: 10px;
}

input {
    width: min(100%, 20rem);
    flex-grow: 1;
}

button:disabled {
    opacity: 0.5;
}
input.typing:placeholder-shown{
    font-style: italic;
}
</style>

// todo - add an option enter is send persisting in db and with switch
