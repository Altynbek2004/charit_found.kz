<template>
    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Users</h2>
            </div>
        </div>
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Surname</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                <tr v-for="user in users" :key="user.id">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ user.id }}</td>
                    <td class="px-6 py-4">{{ user.name }}</td>
                    <td class="px-6 py-4">{{ user.surname}}</td>
                    <td class="px-6 py-4">{{ user.email }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";
import axios from "axios";
const users = ref([]);

    onMounted(async () => {

        try {
            const response = await axios.get('/api/user');
            users.value = Array.isArray(response.data.user) ? response.data.user : [response.data.user];
        } catch (error) {
            console.error('Қате шықты ', error);
        }
    });
</script>

<style scoped>

</style>
