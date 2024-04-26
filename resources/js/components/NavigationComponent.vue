<template>
    <v-card>
        <v-layout>
            <v-navigation-drawer location="left">
                <template v-slot:prepend>
                    <v-list-item
                        lines="two"
                        prepend-avatar="https://randomuser.me/api/portraits/women/81.jpg"
                        subtitle="Logged in"
                        :title="user"
                    ></v-list-item>
                </template>

                <v-divider></v-divider>

                <v-list density="compact" nav>
                    <v-list-item
                        prepend-icon="mdi-home-city"
                        title="Home"
                        value="home"
                    ></v-list-item>
                    <v-list-item
                        prepend-icon="mdi-account"
                        title="My Account"
                        value="account"
                    ></v-list-item>
                    <v-list-item
                        prepend-icon="mdi-account-group-outline"
                        title="Users"
                        value="users"
                    ></v-list-item>
                    <logout/>
                </v-list>
            </v-navigation-drawer>
            <!-- <v-system-bar color="gray"></v-system-bar> -->
            <v-app-bar :elevation="1" class="py-2">
                <!-- <template v-slot:append>
                    <v-list-item
                        lines="two"
                        prepend-avatar="https://randomuser.me/api/portraits/women/81.jpg"
                        subtitle="Logged in"
                        title="Jane Smith"
                    ></v-list-item>
                </template> -->

                <!-- <v-app-bar-title>Application Bar</v-app-bar-title> -->
            </v-app-bar>
            <v-main>
                
            </v-main>
        </v-layout>
    </v-card>
</template>
<script>
import Logout from './LogoutComponent.vue';
export default {
  components: { Logout },
  props : {
    user : {
        type : [Object, Array],
        default : () => {},
        required : true,
    }
  },

  mounted() {
    console.log(this.user);
  }
    
}
</script>
