require('./bootstrap');

window.Vue = require('vue');

import {VueForm} from "@dymantic/vue-forms";
import {Dropdown, Modal, DeleteModal} from "@dymantic/vuetilities";
import {ImageUpload} from "@dymantic/imagineer";
import UsersIndex from "./components/UsersIndex";
import UserForm from "./components/UserForm";
import UserPage from "./components/UserPage";
import TeamIndex from "./components/TeamIndex";
import TeamMemberForm from "./components/TeamMemberForm"
import TeamMemberPage from "./components/TeamMemberPage";

Vue.component('vue-form', VueForm);
Vue.component('dropdown-item', Dropdown);
Vue.component('modal', Modal);
Vue.component('image-upload', ImageUpload);
Vue.component('delete-modal', DeleteModal);
Vue.component('users-index', UsersIndex);
Vue.component('user-form', UserForm);
Vue.component('user-page', UserPage);
Vue.component('team-index', TeamIndex);
Vue.component('team-member-form', TeamMemberForm);
Vue.component('team-member-page', TeamMemberPage);



const app = new Vue({
    el: '#app'
});
