<template>
    <div class="flex">
        <table class="table-auto mx-auto w-3/4">
            <thead class="">
                <tr class="">
                    <th class="border-2 border-purple-400">
                        ID
                    </th>
                    <th class="border-2 border-purple-400">
                        Name
                    </th>
                    <th class="border-2 border-purple-400">
                        Email
                    </th>
                    <th class="border-2 border-purple-400">
                        admin
                    </th>
                </tr>
            </thead>
            <tbody class="">
                <tr v-for="(user, index) in users" :key="user.id" class="">
                    <th class="border-2 border-purple-400">
                        <p @click="showConfirmForm(user)">{{ user.id }}</p>
                    </th>
                    <th class="border-2 border-purple-400">
                        {{ user.name }}
                    </th>
                    <th class="border-2 border-purple-400">
                        {{ user.email }}
                    </th>
                    <th class="border-2 border-purple-400">
                        {{ adminBool[index] }}
                    </th>
                </tr>
            </tbody>
        </table>
        <confirmation-modal :show="confirmingUserDeletion">
            <template #title> Change {{ user.name }} rights ? </template>
            <template #content>
                Are you sure you want to change this users right? this can have
                massive impact on the website !
            </template>
            <template #footer>
                <secondary-button @click.native="cancelChangeAdmin">
                    Nevermind
                </secondary-button>

                <danger-button
                    @click.native="changeAdminRights(user)"
                    class="ml-2"
                >
                    Make {{ userRightNameReversed }}
                </danger-button>
            </template>
        </confirmation-modal>
    </div>
</template>

<script>
import ConfirmationModal from "../Jetstream/ConfirmationModal.vue";
import DangerButton from "../Jetstream/DangerButton.vue";
import SecondaryButton from "../Jetstream/SecondaryButton.vue";
export default {
    props: {
        users: Array
    },
    components: {
        ConfirmationModal,
        DangerButton,
        SecondaryButton
    },
    data() {
        return {
            confirmingUserDeletion: false,
            user: {}
        };
    },
    methods: {
        showConfirmForm(user) {
            this.confirmingUserDeletion = true;
            this.user = user;
        },
        changeAdminRights(user) {
            this.$inertia
                .post(`/dashboard/admin/user/${user.id}`)
                .then(() => (this.confirmingUserDeletion = false));
        },
        cancelChangeAdmin() {
            this.confirmingUserDeletion = false;
            this.user = {};
        }
    },
    computed: {
        adminBool: function() {
            return this.users.map(user => (user.admin ? "Yes" : "No"));
        },
        userRightNameReversed: function() {
            return this.user.admin == 1 ? "Normal" : "Admin";
        }
    }
};
</script>
