<template>
    <div class="flex">
       hoi
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
