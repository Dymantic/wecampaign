<template>
    <div class="max-w-sm mx-auto">
        <vue-form url="/contact"
                  :form-attributes="contactForm"
                  :use-custom-submit="true"
                  @submission-okay="submitted = true">
            <div slot="form-body"
                 slot-scope="{formData, formErrors, waiting}">
                <div :class="{'opacity-50': waiting}">
                    <div class="form-group my-3"
                         :class="{'has-error': formErrors.name}">
                        <label class="text-sm font-bold"
                               for="name">{{ nameLabel }}</label>
                        <span class="text-xs text-red"
                              v-show="formErrors.name">{{ formErrors.name }}</span>
                        <input type="text"
                               name="name"
                               v-model="formData.name"
                               class="w-full h-8 pl-2 mt-1 border"
                               id="name">
                    </div>
                    <div class="form-group my-3"
                         :class="{'has-error': formErrors.email}">
                        <label class="text-sm font-bold"
                               for="email">{{ emailLabel }}</label>
                        <span class="text-xs text-red"
                              v-show="formErrors.email">{{ formErrors.email }}</span>
                        <input type="text"
                               name="email"
                               v-model="formData.email"
                               class="w-full h-8 pl-2 mt-1 border"
                               id="email">
                    </div>
                    <div class="form-group my-3"
                         :class="{'has-error': formErrors.phone_number}">
                        <label class="text-sm font-bold"
                               for="phone_number">{{ phoneLabel }}</label>
                        <span class="text-xs text-red"
                              v-show="formErrors.phone_number">{{ formErrors.phone_number }}</span>
                        <input type="text"
                               name="phone_number"
                               v-model="formData.phone_number"
                               class="w-full h-8 pl-2 mt-1 border"
                               id="phone_number">
                    </div>
                    <div class="form-group my-3"
                         :class="{'has-error': formErrors.message_text}">
                        <label class="text-sm font-bold"
                               for="message_text">{{ messageLabel }}</label>
                        <span class="text-xs text-red"
                              v-show="formErrors.message_text">{{ formErrors.message_text }}</span>
                        <textarea name="message_text"
                                  id="message_text"
                                  v-model="formData.message_text"
                                  class="h-32 border p-2 mt-1 w-full"
                        ></textarea>
                    </div>
                </div>

                <div class="my-4">
                    <button class="w-full h-12 text-white uppercase tracking-wide" type="submit" :disabled="waiting" :class="waiting ? 'bg-teal' : 'bg-black hover:bg-grey-darkest'">
                        <span v-if="!waiting">{{ submitButtonText }}</span>
                        <div v-if="waiting" class="bouncing-loader h-12">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </button>
                </div>
            </div>
        </vue-form>
        <div class="fixed pin z-50 bg-trans-mask flex justify-center items-center"
             v-if="submitted">
            <div class="success-modal-inner shadow-lg overflow-hidden relative w-full max-w-sm  flex flex-col items-center bg-white rounded">
                <div class="w-full bg-teal mb-8 thanks-header flex justify-center py-4">
                    <svg viewBox="0 0 200 100"
                         height="100px">
                        <circle class="draw-path"
                                r="45"
                                cx="100"
                                cy="50"
                                stroke-width="3"
                                stroke="#fff"
                                fill="none"></circle>
                        <path class="draw-path"
                              d="M65 50 L 90 80 L 135 35"
                              stroke-width="3"
                              stroke="#fff"
                              fill="none"></path>
                    </svg>
                </div>
                <p class="thanks-text text-lg text-grey-dark px-8 px-8">
                    Your message has been sent. Thanks for getting in touch.
                </p>
                <button @click="clearForm"
                        class="px-4 py-2 mb-8 bg-black text-white rounded shadow clear-btn mt-12"
                        type="button">Okay
                </button>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import {Form} from "@dymantic/vue-forms";

    export default {
        props: ['name-label', 'email-label', 'phone-label', 'message-label', 'submit-button-text'],
        data() {
            return {
                contactForm: new Form({
                    name: '',
                    email: '',
                    phone_number: '',
                    message_text: ''
                }),
                submitted: false
            };
        },

        methods: {
            clearForm() {
                this.submitted = false;
                this.contactForm.resetFields();
            }
        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">

    .success-modal-inner {
        animation-name: grow-up;
        animation-duration: .3s;
        animation-fill-mode: forwards;
    }

    .thanks-header {
        animation-name: slide-down;
        animation-duration: .3s;
        animation-delay: .3s;
        animation-fill-mode: both;
        animation-timing-function: ease-in-out;
    }

    .thanks-text, .clear-btn {
        animation-name: fade-up;
        animation-duration: .3s;
        animation-delay: .5s;
        animation-fill-mode: both;
        animation-timing-function: ease-in-out;
    }

    @keyframes grow-up {
        from {
            transform: scale(0);
        }
        to {
            transform: scale(1);
        }
    }

    @keyframes slide-down {
        from {
            transform: translate3d(0, -100%, 0);
        }
        to {
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes fade-up {
        from {
            opacity: 0;
            transform: translate3d(0, 15px, 0);
        }
        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }

    .draw-path {
        animation-name: draw-line;
        animation-delay: .5s;
        animation-duration: .7s;
        animation-timing-function: ease-in-out;
        animation-fill-mode: forwards;
    }

    circle.draw-path {
        stroke-dashoffset: 300;
        stroke-dasharray: 300;
    }

    path.draw-path {
        stroke-dashoffset: 180;
        stroke-dasharray: 180;
    }

    @keyframes draw-line {
        to {
            stroke-dashoffset: 0;
        }
    }

    @keyframes bouncing-loader {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0.1;
            transform: translateY(-1rem);
        }
    }
    .bouncing-loader {
        display: flex;
        justify-content: center;
    }
    .bouncing-loader > div {
        width: 1rem;
        height: 1rem;
        margin: 1.25rem 0.2rem;
        background: #8385aa;
        border-radius: 50%;
        animation: bouncing-loader 0.6s infinite alternate;
    }
    .bouncing-loader > div:nth-child(2) {
        animation-delay: 0.2s;
    }
    .bouncing-loader > div:nth-child(3) {
        animation-delay: 0.4s;
    }

</style>

<style lang="css"
       type="text/css">


</style>