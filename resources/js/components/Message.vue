<template>
  <v-card
      :class='["message", { dark }]'
  >
  {{ content }}
  <v-divider></v-divider>
  sent by <i>{{ sender.name }}</i> at {{ sentAt }}
  </v-card>
</template>

<script>
export default {
  name: 'Message',
  props: {
    content : {
      type : String,
    },
    sender : {
      type : Object,
    },
    isSentByMe : {
      type :Boolean,
    },
    dark: {
      type : Boolean
    },
    sentAt : {
      type : String
    }

  },
}
</script>

<style scoped>
.message {
  background: #e7e7e7;
  border-radius: 10px;
  padding: 1rem;
  width: fit-content;
}

.message.dark {
  background: #e9eaf6;
}

h5 {
  margin: 0 0 .5rem 0;
}
</style>
