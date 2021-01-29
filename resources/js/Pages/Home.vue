<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Home
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white pb-4 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <div class="flex flex-col">
                        <h1
                            :class="'mx-auto text-2xl my-4 ' + kindStyling"
                            @click="changeKind"
                        >
                            Homework {{ kind }}
                        </h1>
                        <div class="flex flex-row w-full justify-center">
                            <assignment-card
                                class="m-2"
                                :assignment="ass"
                                v-for="ass in theAsses.data"
                                :key="ass.id"
                            ></assignment-card>
                        </div>
                        <div class="flex flex-row mx-auto">
                            <div
                                v-for="(link, index) in theAsses.meta.links"
                                :key="index"
                                class=" m-2"
                            >
                                <inertia-link :href="link.url" v-if="link.url">
                                    <p
                                        v-if="currentPageStyling !== link.label"
                                        v-html="link.label"
                                        class="no-underline hover:text-blue-600 hover:underline"
                                    >
                                        {{ link.label }}
                                    </p>
                                    <p
                                        v-else
                                        class="underline hover:text-blue-600"
                                    >
                                        {{ link.label }}
                                    </p>
                                </inertia-link>
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
import AssignmentCard from "../components/AssignmentCard.vue";

export default {
    name: "Home",
    components: {
        AppLayout,
        AssignmentCard
    },
    data: function() {
        return {
            kind: "due"
        };
    },
    props: {
        collection: Object,
        pastDueAssignments: Object
    },
    methods: {
        checkDue(ass) {
            const currentDate = new Date();
            const assDate = new Date(ass["due_date"]);
            console.log(assDate.now());
            return assDate.now() < currentDate.now();
        },
        changeKind() {
            this.kind === "due"
                ? (this.kind = "past due")
                : (this.kind = "due");
        }
    },
    computed: {
        currentPageStyling: function() {
            return this.collection.meta["current_page"];
        },
        theAsses: function() {
            if (this.kind === "due") return this.collection;
            return this.pastDueAssignments;
        },
        kindStyling: function() {
            if (this.kind === "due") return "hover:text-red-600";
            return "hover:text-blue-600";
        }
    }
};
</script>
