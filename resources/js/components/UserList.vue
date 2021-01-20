<template>
    <div class="flex">
        <table class="table-auto mx-auto w-3/4">
            <thead class="">
                <tr class="">
                    <th class="border-2 border-purple-400">
                        ID
                    </th>
                    <th class="border-2 border-purple-400">
                        Name
                    </th>
                    <th class="border-2 border-purple-400">
                        Email
                    </th>
                    <th class="border-2 border-purple-400">
                        admin
                    </th>
                </tr>
            </thead>
            <tbody class="">
                <tr v-for="(user, index) in users" :key="user.id" class="">
                    <th class="border-2 border-purple-400">
                        {{ user.id }}
                    </th>
                    <th class="border-2 border-purple-400">
                        {{ user.name }}
                    </th>
                    <th class="border-2 border-purple-400">
                        {{ user.email }}
                    </th>
                    <th class="border-2 border-purple-400">
                        {{ adminBool[index] }}
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        users: Array
    },
    data() {
        return {};
    },

    computed: {
        adminBool: function() {
            return this.users.map(user => (user.admin ? "Yes" : "No"));
        }
    }
};
</script>
