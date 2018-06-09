<template>
    <div>
        <div class="flex justify-between items-center mt-4 mb-12">
            <h1 class="text-4xl font-sans text-grey-darkest normal">The Team</h1>
            <div class="flex justify-end items-center">
                <team-member-form url="/admin/team-members"
                                  button-text="Add Member"
                                  :form-object="blank_member"
                                  form-title="Add a new team member"
                                  @member-persisted="addMember"
                ></team-member-form>
            </div>
        </div>
        <p class="my-12 text-lg">This is the team which will be shown on the site's "Team" page. You may add a new team member using the button above. Once you have added a team member, you may upload their profile image and can also edit their name and bio (in Korean and English). Once you are done, you need to make the profile public before it will show on the site.</p>
        <div>
            <a :href="`/admin/team-members/${member.id}`" v-for="member in members" :key="member.id" class="mb-12 w-full block no-underline hover:bg-grey-lighter p-2 rounded">
                <div class="flex max-w-full items-center">
                    <img :src="member.avatar_thumb_src" height="120px" width="120px" class="block rounded-full" :class="{'opacity-50': !member.published}">

                    <div class="flex-1 max-w-full pl-8">
                        <p class="font-black text-black">{{ member.name_ko }}</p>
                        <p class="mb-4 w-4/5 italic text-grey-dark truncate">{{ member.bio_ko }}</p>
                        <p class="font-black text-black">{{ member.name_en }}</p>
                        <p class="w-4/5 italic text-grey-dark truncate">{{ member.bio_en }}</p>
                    </div>
                </div>

            </a>
        </div>
    </div>
</template>

<script type="text/babel">
    import {Form} from "@dymantic/vue-forms";

    export default {
        props: ['team'],

        data() {
            return {
                members: [],
                blank_member: new Form({
                    'name_en': '',
                    'name_ko': '',
                    'bio_en': '',
                    'bio_ko': ''
                })
            };
        },

        created() {
            this.members = this.team || [];
        },

        methods: {
            addMember(member) {
                this.blank_member.resetFields();
                this.members.push(member);
            }
        }
    }
</script>

<style scoped lang="scss" type="text/scss">

</style>