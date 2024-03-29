<template>
  <div class='chat-box'>
    <input
        v-model='text'
        placeholder='Write a message'
        type='text'
    />
    <button :disabled='text === ""' @click="onSubmit()">Send</button>
  </div>
</template>

<script>
export default {
  name: 'ChatBox',
  data: () => ({
    text: ''
  }),
  methods: {

    // We will call this when the form is submitted
    onSubmit() {
      this.$emit("submit", this.text);
      this.text = '';
    }
  }
}
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
</style>
