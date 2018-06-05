<template>
    <span>
        <button @click="showForm = true" class="btn btn-primary">{{ buttonText }}</button>
        <modal :show="showForm">
            <div slot="body" class="border-t-4 border-black">
                <vue-form :url="url" :form-attributes="formObject" button-classes="btn btn-primary ml-4" class="max-w-sm mx-auto" @submission-okay="memberPersisted">
                    <div slot="form-body" slot-scope="{formData, formErrors}">
                        <h2 class="my-4">{{ formTitle}}</h2>
                        <p class="my-4">Add at least a name in either Korean or English to get started.</p>
                        <div class="border-b-2 border-black mb-4">
                            <button class="border-t-2 border-l-2 border-r-2 border-transparent py-2 px-4 font-bold" :class="{'border-black text-black': lang === 'ko', 'text-grey hover:text-grey-dark': lang === 'en'}" type="button" @click="showLanguage('ko')">Korean</button>
                            <button class="border-t-2 border-l-2 border-r-2 border-transparent py-2 px-4 font-bold" :class="{'border-black text-black': lang === 'en', 'text-grey hover:text-grey-dark': lang === 'ko'}" type="button" @click="showLanguage('en')">English</button>
                        </div>
                        <div v-if="lang === 'ko'">
                            <div class="form-group my-3" :class="{'has-error': formErrors.name_ko}">
                                <label class="text-sm font-bold" for="name_ko">Name (Korean)</label>
                                <span class="text-xs text-danger" v-show="formErrors.name_ko">{{ formErrors.name_ko }}</span>
                                <input type="text" name="name_ko" v-model="formData.name_ko" class="w-full h-8 pl-2 mt-2 border" id="name_ko">
                            </div>
                            <div class="form-group my-3" :class="{'has-error': formErrors.bio_ko}">
                                <label class="text-sm font-bold" for="bio_ko">Bio (Korean)</label>
                                <span class="text-xs text-danger" v-show="formErrors.bio_ko">{{ formErrors.bio_ko }}</span>
                                <textarea name="bio_ko" id="bio_ko" v-model="formData.bio_ko" class="w-full border p-2 h-32 mt-2"></textarea>
                            </div>
                        </div>
                        <div v-if="lang === 'en'">
                            <div class="form-group my-3" :class="{'has-error': formErrors.name_en}">
                                <label class="text-sm font-bold" for="name_en">Name (English)</label>
                                <span class="text-xs text-danger" v-show="formErrors.name_en">{{ formErrors.name_en }}</span>
                                <input type="text" name="name_en" v-model="formData.name_en" class="w-full h-8 pl-2 mt-2 border" id="name_en">
                            </div>
                            <div class="form-group my-3" :class="{'has-error': formErrors.bio_en}">
                                <label class="text-sm font-bold" for="bio_en">Bio (English)</label>
                                <span class="text-xs text-danger" v-show="formErrors.bio_en">{{ formErrors.bio_en }}</span>
                                <textarea name="bio_en" id="bio_en" v-model="formData.bio_en" class="w-full border p-2 h-32 mt-2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div slot="form-button-row">
                        <button type="button" class="btn-cancel" @click="showForm = false">Cancel</button>
                    </div>
                </vue-form>
            </div>
        </modal>
    </span>
</template>

<script type="text/babel">
    export default {
        props: ['url', 'button-text', 'form-title', 'form-object'],
        
        data() {
            return {
                showForm: false,
                lang: 'ko'
            };
        },

        methods: {
            showLanguage(lang) {
                this.lang = lang;
            },

            memberPersisted(member) {
                this.$emit('member-persisted', member);
                this.showForm = false;
            }
        }
    }
</script>

<style scoped lang="scss" type="text/scss">

</style>