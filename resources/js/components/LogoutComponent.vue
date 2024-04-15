<template>
    <v-list-item
        prepend-icon="mdi-logout"
        title="Logout"
        value="true"
        @click="logout"
    ></v-list-item>
</template>

<script>
export default {
    name: "Logout",
    methods: {
        logout() {
            window.axios
                .post("/logout")
                .then(window.location.replace("login"))
                .catch((err) => console.log(err));
        },
    },
};
</script>
