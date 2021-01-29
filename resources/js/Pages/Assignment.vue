<template>
    <app-layout>
        <template #header>
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ assignment.class }}
                </h2>
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white pb-4 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <article class="flex flex-col py-4">
                        <div class="text-center">
                            <h2 class="text-3xl font-bold">
                                {{ assignment.title }}
                            </h2>
                        </div>

                        <div class="w-1/2 mx-auto my-4 flex flex-col">
                            <p class="">
                                {{ assignment.description }}
                            </p>
                            <div class="flex flex-row mt-4 text-lg">
                                <p class="font-bold">Due at:</p>
                                <p class="ml-1 text-red-600 font-bold">
                                    {{ dueDate }}
                                </p>
                            </div>
                            <div class="flex flex-row pt-4">
                                <p class="text-lg font-bold">Status:</p>
                                <p
                                    @click="changeState"
                                    class="ml-1 text-lg hover:text-blue-600"
                                >
                                    {{ stateToText }}
                                </p>
                            </div>
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
            mutatedState: this.state.state,
            submit: false,
            countdown: null
        };
    },
    props: {
        assignment: Object,
        state: Object
    },
    methods: {
        changeState() {
            // set the state
            this.mutatedState < 3
                ? this.mutatedState++
                : (this.mutatedState = 0);

            // cancel the submit if there is one
            if (this.submit) {
                clearTimeout(this.countdown);
                this.submit = !this.submit;
            }
            //start a new submit
            this.startCountDown();
        },
        submitState() {
            this.$inertia
                .post(
                    `/assignment/${this.assignment.id}/status/${this.mutatedState}`
                )
                .then(res => console.log("zuccc"))
                .catch(e => console.error(e));
        },
        startCountDown() {
            this.countdown = setTimeout(() => {
                this.submitState();
                this.submit = !this.submit;
            }, 750);
        }
    },
    computed: {
        dueDate: function() {
            const date = new Date(this.assignment["due_date"]);
            return `${date.getDate()}-${date.getMonth() +
                1}-${date.getFullYear()}`;
        },
        stateToText: function() {
            const state = this.mutatedState;
            switch (state) {
                case 1:
                    return "waiting";
                case 2:
                    return "working on it";
                case 3:
                    return "done POGGERS";
                default:
                    return "nothing yet";
            }
        }
    }
};
</script>
