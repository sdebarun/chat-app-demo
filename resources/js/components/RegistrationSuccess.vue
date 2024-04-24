<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" sm="8" md="6">
          <v-card-title class="text-center">Registration Successful!</v-card-title>
          <v-card-text class="text-center">
            <v-icon class="success-icon" :size="iconSize" icon="mdi-check" color="success"></v-icon>
            <p>Thank you for registering with us!</p>
          </v-card-text>
       
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    successColor: 'white', // Change the color as per your design
    iconSize: 150 // Change the size of the icon as needed
  })
};
</script>

<style scoped>
.success-card {
  padding: 20px;
  border-radius: 10px;
}

.success-icon {
  animation: bounce 1s infinite alternate;
}

@keyframes bounce {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(1.2);
  }
}
</style>
