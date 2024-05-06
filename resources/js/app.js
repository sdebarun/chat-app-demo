/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import vuetify from "./plugins/vuetify";
/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import Message from "./components/Message.vue";
import ChatBox from "./components/ChatBox.vue";
import RegisterDialog from "./components/RegisterDialog.vue";
import ChatView from "./components/ChatView.vue";
import SliderCmponent from "./components/SliderCmponent.vue";
import ConsultantComponent from "./components/ConsultantComponent.vue";
import FooterComponent from "./components/FooterComponent.vue";
import RegistrationComponent from "./components/RegistrationComponent.vue";
import NavigationComponent from "./components/NavigationComponent.vue"
import LoginComponent from './components/LoginComponent.vue';
import SingleConsultant from './components/SingleConsultantComponent.vue';
import ContactUs from './components/ContactUsComponent.vue';
import FaqComponent from './components/FaqComponent.vue';
import ProductsComponent from './components/ProductsComponent.vue';
app.component('example-component', ExampleComponent);
app.component('Message', Message);
app.component('ChatBox', ChatBox);
app.component('RegisterDialog', RegisterDialog);
app.component('chat-view', ChatView);
app.component('slider', SliderCmponent);
app.component('consultant', ConsultantComponent);
app.component('footer-section', FooterComponent );
app.component('registration', RegistrationComponent);
app.component('navbar', NavigationComponent);
app.component('Login', LoginComponent);
app.component('single-consultant', SingleConsultant);
app.component('contact-us', ContactUs);
app.component('faq', FaqComponent);
app.component('products', ProductsComponent);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */
app.use(vuetify);
app.mount('#app');
