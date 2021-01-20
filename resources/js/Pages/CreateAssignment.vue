<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add assignment
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
                        <div class="form"></div>
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
