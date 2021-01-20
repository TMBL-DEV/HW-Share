<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white pb-4 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <div id="admin flex flex-col">
                        <div
                            class="top flex flex-col py-4 justify-center text-center"
                        >
                            <h2 class="text-3xl">Admin Panel</h2>
                            <p>With great power comes great responsibility</p>
                        </div>
                        <div class="">
                            <User-list :users="users" />
                        </div>
                        <div
                            class="flex justify-center flex-col text-center py-4"
                        >
                            <h3 class="text-2xl">
                                Do you want to add an assignment?
                            </h3>
                            <div class="flex flex-row mx-auto py-2">
                                <Button :href="route('assignment.create')">
                                    Add Assignment
                                </Button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import UserList from "@/components/UserList";
import Button from "@/Jetstream/Button.vue";
export default {
    components: {
        AppLayout,
        UserList,
        Button
    },
    props: {
        users: Array
    }
};
</script>
