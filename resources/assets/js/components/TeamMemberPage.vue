<template>
    <div>
        <div class="flex justify-between items-center mt-4 mb-12">
            <h1 class="text-4xl font-sans text-grey-darkest normal">{{ name_ko }}</h1>
            <div class="flex justify-end items-center">
                <delete-modal :resource-name="`${name_ko} [${name_en}]`"
                              :delete-url="`/admin/team-members/${member.id}`"
                              @item-deleted="memberDeleted"
                              button-classes="btn btn-danger mr-4"
                              delete-button-classes="btn btn-danger"
                              cancel-button-classes="btn-cancel mr-4"
                ></delete-modal>
                <team-member-form :url="`/admin/team-members/${member.id}`"
                                  :form-object="member_form"
                                  button-text="Edit"
                                  form-title="Edit this team member"
                                  @member-persisted="updateMemberDetails"
                ></team-member-form>
            </div>
        </div>
        <div class="=my-8 flex items-center justify-between">
            <div>
                <p class="text-xs uppercase tracking-wide font-black text-black">Status</p>
                <p>{{ published_status }}</p>
            </div>
            <div>
                <toggle-switch label="Publish?"
                               on-url="/admin/published-team-members"
                               :post-body='{"member_id": member.id}'
                               :off-url="`/admin/published-team-members/${member.id}`"
                               @toggle-switched-on="published = true"
                               @toggle-switched-off="published = false"
                               :switch-state="published"
                               class="text-black"
                ></toggle-switch>
            </div>
        </div>
        <div class="flex pt-12">
            <div class="w-1/2">
                <div class="mb-12">
                    <p class="text-xs uppercase tracking-wide font-black text-black">Korean</p>
                    <p class="text-lg text-black">{{ name_ko }}</p>
                    <p class="mt-3 italic text-grey-dark">{{ bio_ko }}</p>
                </div>
                <div class="my-12">
                    <p class="text-xs uppercase tracking-wide font-black text-black">English</p>
                    <p class="text-lg text-black">{{ name_en }}</p>
                    <p class="mt-3 italic text-grey-dark">{{ bio_en }}</p>
                </div>
            </div>
            <div class="w-1/2 profile-image">
                <div class="w-64 mx-auto">
                    <p class="text-xs uppercase tracking-wide font-black text-black">Avatar</p>

                    <image-upload :upload-url="`/admin/team-members/${member.id}/avatar`"
                                  :delete-url="`/admin/team-members/${member.id}/avatar`"
                                  :initial-src="member.avatar_thumb_src"
                                  :aspect-x="3"
                                  :aspect-y="3"
                                  class=""
                    ></image-upload>
                    <p class="my-4 text-sm"><strong>Note: </strong>Use an image of at least 300 x 300px. The image will be cropped in the center if it is not a square.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import {Form} from "@dymantic/vue-forms";

    export default {
        props: ['member'],

        data() {
            return {
                member_form: new Form({
                    name_en: this.member.name_en,
                    name_ko: this.member.name_ko,
                    bio_en: this.member.bio_en,
                    bio_ko: this.member.bio_ko,
                }),
                name_en: '',
                name_ko: '',
                bio_en: '',
                bio_ko: '',
                published: false,
            };

        },

        computed: {
          published_status() {
              return this.published ? 'This profile is public and will be shown on the site' : 'This profile is currently private and cannot be seen on the site';
          }
        },

        created() {
            this.name_en = this.member.name_en || '';
            this.name_ko = this.member.name_ko || '';
            this.bio_en = this.member.bio_en || '';
            this.bio_ko = this.member.bio_ko || '';
            this.published = !! this.member.published
        },

        methods: {
            updateMemberDetails({name_en, name_ko, bio_en, bio_ko}) {
                this.name_en = name_en || '';
                this.name_ko = name_ko || '';
                this.bio_en = bio_en || '';
                this.bio_ko = bio_ko || '';
            },

            memberDeleted() {
                window.location = '/admin/team-members';
            }
        }
    }
</script>

<style lang="css" type="text/css">
    .profile-image img {
        border-radius: 50%;
        display: block;
    }
</style>