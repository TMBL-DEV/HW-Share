<template>
    <app-layout>
        <template #header>
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ assignment.class }}
                </h2>
                <p class="text-red-600">Due at {{ dueDate }}</p>
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white pb-4 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <article class="flex flex-col py-4">
                        <div class="text-center">
                            <h2 class="text-xl font-medium">
                                {{ assignment.title }}
                            </h2>
                        </div>
                        <div class="w-3/4 mx-auto my-4">
                            <p>
                                {{ assignment.description }}
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    name: "Assignment",
    components: {
        AppLayout
    },
    data: function() {
        return {
            // kind: "due"
        };
    },
    props: {
        assignment: Object
    },
    methods: {},
    computed: {
        dueDate: function() {
            const date = new Date(this.assignment["due_date"]);
            return `${date.getDate()}-${date.getMonth() +
                1}-${date.getFullYear()}`;
        }
    }
};
</script>
