<template>
    <div class="w-80">
        <div
            class="flex flex-row bg-white shadow-sm border-white hover:border-gray-500 border-gray-200 border-2 rounded p-4"
        >
            <div class="flex flex-col flex-grow ml-4">
                <div class="text-md text-blue-500">
                    {{ assignment.class }}
                </div>
                <div class="text-md text-gray-500">
                    {{ assignment.title }}
                </div>
                <div class="font-bold text-sm">
                    {{ displayDate }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        assignment: Object
    },
    computed: {
        displayDate: function() {
            const dateObject = new Date(this.assignment["due_date"]);
            return `${dateObject.getDate()}-${dateObject.getMonth() +
                1}-${dateObject.getFullYear()}`;
        }
    }
};
</script>

<style></style>
