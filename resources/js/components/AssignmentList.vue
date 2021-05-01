<template>
    <div class="flex flex-col">
        <div class="bar p-2 bg-purple-500 w-full flex flex-row">
            <h3 class="text-2xl">Assignments</h3>
            <h3 class="text-2xl">Assignments</h3>
            <h3 class="text-2xl">Assignments</h3>
            <h3 class="text-2xl">Assignments</h3>
        </div>
        <div v-for="ass in assignments" :key="ass.id" class="w-full p-2 flex flex-row">
            {{ ass.title }}
        </div>
    </div>
</template>

<script>
import ConfirmationModal from "../Jetstream/ConfirmationModal.vue";
import DangerButton from "../Jetstream/DangerButton.vue";
import SecondaryButton from "../Jetstream/SecondaryButton.vue";

export default {
    props: {
        assignments: Array
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
    methods: {},
    computed: {}
};
</script>
