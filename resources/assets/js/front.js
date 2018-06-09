require('./bootstrap');

window.Vue = require('vue');

import {VueForm} from "@dymantic/vue-forms";
import ContactForm from "./components/ContactForm";

Vue.component('vue-form', VueForm);
Vue.component('contact-form', ContactForm);



const app = new Vue({
    el: '#app'
});


