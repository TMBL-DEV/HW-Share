<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage assignments
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white pb-4 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <div id="admin flex flex-col">
                        <div class="flex w-full flex-wrap mx-auto justify-center">
                            <AssignmentList class="w-full" :assignments="assignments"></AssignmentList>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Button from "@/Jetstream/Button.vue";
import AssignmentList from "@/components/AssignmentList";

import {Inertia} from '@inertiajs/inertia'

export default {
    components: {
        AppLayout,
        AssignmentList,
        Button
    },
    props: {
        assignments: Array
    },
    methods: {
        redirectTo(url) {
            Inertia.replace(url);
        },
        assignmentPopup(assignment) {

        },
    },
    data: function () {
        return {
            assignment: null
        }
    },
};
</script>
