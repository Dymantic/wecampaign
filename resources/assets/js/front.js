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

const trigger = document.querySelector('.nav-trigger');

trigger.addEventListener('click', ev => {
    const navbar = document.querySelector('.main-navbar');
    if(navbar.classList.contains('expose')) {
        return navbar.classList.remove('expose');
    }
    navbar.classList.add('expose');
});


