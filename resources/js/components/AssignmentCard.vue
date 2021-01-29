<template>
    <inertia-link :href="route('assignment', assignment.id)">
        <div class="w-80">
            <div
                :class="
                    StateStyling +
                        '  flex flex-row bg-white shadow-sm hover:border-gray-500  border-2 rounded p-4'
                "
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
    </inertia-link>
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
        },
        StateStyling: function() {
            let state = this.assignment.state;
            if (!state) state = 0;
            else state = this.assignment.state.state;
            switch (state) {
                case 1:
                    return "border-yellow-400";
                case 2:
                    return "border-blue-400";
                case 3:
                    return "border-green-400";
                default:
                    return "border-red-400";
            }
        }
    }
};
</script>

<style></style>
