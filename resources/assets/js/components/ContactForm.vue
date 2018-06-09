<template>
    <div>
        <vue-form url="/contact" :form-attributes="contactForm" :use-custom-submit="true">
            <div slot="form-body"
                 slot-scope="{formData, formErrors, waiting}">
                <div class="form-group my-3"
                     :class="{'has-error': formErrors.name}">
                    <label class="text-sm uppercase text-green font-bold"
                           for="name">Name</label>
                    <span class="text-xs text-red"
                          v-show="formErrors.name">{{ formErrors.name }}</span>
                    <input type="text"
                           name="name"
                           v-model="formData.name"
                           class="w-full h-8 pl-2 mt-1 border"
                           id="name">
                </div>
                <div class="form-group my-3"
                     :class="{'has-error': formErrors.phone_number}">
                    <label class="text-sm uppercase text-green font-bold"
                           for="phone_number">Phone_number</label>
                    <span class="text-xs text-red"
                          v-show="formErrors.phone_number">{{ formErrors.phone_number }}</span>
                    <input type="text"
                           name="phone_number"
                           v-model="formData.phone_number"
                           class="w-full h-8 pl-2 mt-1 border"
                           id="phone_number">
                </div>
                <div class="form-group my-3"
                     :class="{'has-error': formErrors.email}">
                    <label class="text-sm uppercase text-green font-bold"
                           for="email">Email</label>
                    <span class="text-xs text-red"
                          v-show="formErrors.email">{{ formErrors.email }}</span>
                    <input type="text"
                           name="email"
                           v-model="formData.email"
                           class="w-full h-8 pl-2 mt-1 border"
                           id="email">
                </div>
                <div class="form-group my-3"
                     :class="{'has-error': formErrors.message_text}">
                    <label class="text-sm uppercase text-green font-bold"
                           for="message_text">Message_text</label>
                    <span class="text-xs text-red"
                          v-show="formErrors.message_text">{{ formErrors.message_text }}</span>
                    <input type="text"
                           name="message_text"
                           v-model="formData.message_text"
                           class="w-full h-8 pl-2 mt-1 border"
                           id="message_text">
                </div>
                <div>
                    <span v-show="waiting">waiting on you</span>
                    <button type="submit">Hit it</button>
                </div>
            </div>
        </vue-form>
    </div>
</template>

<script type="text/babel">
    import {Form} from "@dymantic/vue-forms";

    export default {
        data() {
            return {
                contactForm: new Form({
                    name: '',
                    email: '',
                    phone_number: '',
                    message_text: ''
                }),
                waiting: ''
            };
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

</style>