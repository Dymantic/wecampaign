require('./bootstrap');
window.Vue = require('vue');

import {manageScroll} from "./helpers/manageScroll";
import {jumpToTags} from "./helpers/jumpToTags";
import throttle from "lodash.throttle";
import {VueForm} from "@dymantic/vue-forms";
import ContactForm from "./components/ContactForm";

Vue.component('vue-form', VueForm);
Vue.component('contact-form', ContactForm);



const app = new Vue({
    el: '#app'
});

window.addEventListener('scroll', throttle(manageScroll(), 300));


jumpToTags('[data-jump-target]');


