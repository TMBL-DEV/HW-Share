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
                            class="top flex flex-col py-6 justify-center text-center"
                        >
                            <h2 class="text-3xl font-bold">Admin Panel</h2>
                            <p class="text-lg">With great power comes great responsibility!</p>
                        </div>
                        <div class="flex w-4/5 flex-wrap mx-auto justify-center">
                            <section
                                class="flex flex-col lg:my-none mx-auto my-2 bg-opacity-25 pt-2 lg:w-1/3 w-4/5 justify-center shadow-lg border-2 rounded border-purple-500 ">
                                <div class="mx-auto py-2 my-2">
                                    <h1 class="text-2xl font-bold">Assignments</h1>
                                </div>
                                <div class="flex p-2 my-2 mx-auto">
                                    <p class="text-xl">Total: {{ assignmentCount }}</p>
                                </div>
                                <div class="flex p-2 my-2 mx-auto">
                                    <p class="text-xl">Past Due: {{ pastDueCount }}</p>
                                </div>
                                <div class="flex p-2 my-2 mx-auto">
                                    <p class="text-xl">Still Due: {{ dueCount }}</p>
                                </div>
                                <div
                                    class="flex cursor-pointer py-2 mt-2 border-t-2 border-purple-700  w-full justify-center hover:bg-purple-700 bg-purple-500"
                                    @click="redirectTo(route('manage.assignments'))"
                                >
                                    <inertia-link class="text-lg" :href="route('manage.assignments')">Manage
                                        assignments
                                    </inertia-link>
                                </div>
                            </section>
                            <section
                                class="flex flex-col lg:my-none mx-auto my-2 bg-opacity-25 pt-2 lg:w-1/3 w-4/5 justify-center shadow-lg border-2 rounded border-purple-500 ">
                                <div class="mx-auto py-2 my-2">
                                    <h1 class="text-2xl font-bold">Users</h1>
                                </div>
                                <div class="flex p-2 my-2 mx-auto">
                                    <p class="text-xl">Total: {{ userCount }}</p>
                                </div>
                                <div class="flex p-2 my-2 mx-auto">
                                    <p class="text-xl">Admin users: {{ adminCount }}</p>
                                </div>
                                <div class="flex p-2 my-2 mx-auto">
                                    <p class="text-xl">Normal users: {{ normalUserCount }}</p>
                                </div>
                                <div
                                    class="flex cursor-pointer py-2 mt-2 border-t-2 border-purple-700  w-full justify-center hover:bg-purple-700 bg-purple-500"
                                    @click="redirectTo(route('manage.users'))"
                                >
                                    <inertia-link class="text-lg" :href="this.$route('manage.users')">Manage users
                                    </inertia-link>
                                </div>
                            </section>
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

import {Inertia} from '@inertiajs/inertia'

export default {
    components: {
        AppLayout,
        UserList,
        Button
    },
    props: {
        DashboardData: Object,
    },
    methods: {
        redirectTo(url) {
            Inertia.replace(url);
        }
    },
    computed: {
        assignmentCount: function () {
            return this.DashboardData.data.assignmentCount;
        },
        pastDueCount: function () {
            return this.DashboardData.data.pastDueCount;
        },
        dueCount: function () {
            return this.DashboardData.data.dueCount;
        },
        userCount: function () {
            return this.DashboardData.data.userCount;
        },
        adminCount: function () {
            return this.DashboardData.data.users.filter(user => Boolean(user.admin)).length;
        },
        normalUserCount: function () {
            return this.DashboardData.data.users.filter(user => !Boolean(user.admin)).length;
        }
    },
    data: function () {
        return {
            pain: this.route('manage.assignments')
        }
    }
};
</script>
