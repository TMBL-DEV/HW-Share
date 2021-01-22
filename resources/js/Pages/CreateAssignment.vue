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
                        <div class="form mx-auto flex flex-col w-3/4">
                            <h3 class="text-xl text-center">
                                blyat form
                            </h3>
                            <label for="">Class:</label>
                            <select class="my-2" name="" id="">
                                <option
                                    v-for="(item, index) in classes"
                                    :key="index"
                                    :value="item"
                                    >{{ item }}</option
                                >
                            </select>
                            <label for="">Name:</label>
                            <input
                                class="my-2"
                                type="text"
                                name=""
                                placeholder="The title of the assignment mate"
                                id=""
                            />
                            <label for="">Description:</label>
                            <textarea
                                class="my-2"
                                name=""
                                id=""
                                cols="30"
                                rows="10"
                                placeholder="The description of the assignment mate"
                            ></textarea>
                            <label for="">Due date:</label>
                            <input type="date" name="" id="" class="my-2" />
                            <Button class="w-12 mx-auto mt-2"
                                ><p>Save</p></Button
                            >
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
            ]
        };
    }
};
</script>
