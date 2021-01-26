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
                        <form
                            @submit.prevent="saveAss"
                            class="form mx-auto flex flex-col w-3/4"
                            ref="form"
                        >
                            <h3 class="text-xl text-center">
                                blyat form
                            </h3>
                            <label for="">Class:</label>
                            <select
                                required
                                class="my-2"
                                name="class"
                                v-model="form.classes"
                                id=""
                            >
                                <option
                                    v-for="(item, index) in classes"
                                    :key="index"
                                    :value="item"
                                    >{{ item }}</option
                                >
                            </select>
                            <div v-if="errors.class">
                                {{ errors.class }}
                            </div>
                            <label for="">Title:</label>
                            <input
                                required
                                v-model="form.title"
                                class="my-2"
                                type="text"
                                name="title"
                                placeholder="The title of the assignment mate"
                                id=""
                            />
                            <div v-if="errors.title">
                                {{ errors.title }}
                            </div>
                            <label for="">Description:</label>
                            <textarea
                                required
                                v-model="form.description"
                                class="my-2"
                                name="description"
                                id=""
                                cols="30"
                                rows="10"
                                placeholder="The description of the assignment mate"
                            ></textarea>
                            <div v-if="errors.description">
                                {{ errors.description }}
                            </div>
                            <label for="">Due date:</label>
                            <input
                                required
                                v-model="form.dueDate"
                                type="date"
                                name="due_date"
                                id=""
                                class="my-2"
                            />
                            <div v-if="errors.dueDate">
                                {{ errors.dueDate }}
                            </div>
                            <Button @click="saveAss" class="w-12 mx-auto mt-2"
                                ><p>Save</p></Button
                            >
                        </form>
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
        users: Array,
        errors: Object
    },
    data() {
        return {
            classes: [
                "Logica",
                "Loopbaan en Burgerschap",
                "Engels",
                "Nederlands",
                "Rekenen",
                "PHP",
                "Frameworks",
                "Java",
                "Project",
                "UML",
                "SQL"
            ],
            form: {
                title: "",
                description: "",
                classes: "",
                dueDate: Date
            },
            error: Object
        };
    },
    methods: {
        saveAss() {
            this.$inertia
                .post(route("assignment.store"), this.form)
                .then(() => {})
                .catch(
                    e => (this.error = e) && console.error(this.error.message)
                );
        }
    }
};
</script>
