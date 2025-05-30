<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <div class="fixed left-0 top-0 h-full w-60 bg-white shadow-md z-10">
            <!-- Logo -->
            <div class="flex items-center px-5 h-16 border-b border-gray-100">
                <i class="fas fa-cube text-indigo-500 text-xl mr-2"></i>
                <span class="font-bold text-lg text-gray-800">StrikingDash</span>
            </div>

            <!-- Main Menu -->
            <div class="py-4">
                <div class="px-5 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    MAIN MENU
                </div>
                <ul class="mt-2">
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Dashboard</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="/admin/panel/users"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Users / Қолданушылар</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="/admin/panel/content"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Content Management / Контент басқару</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Products / Items</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Orders / Жазылулар</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Объявление / Хабарландыру</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Settings / Параметрлер</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Support / Жәрдем</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Logs / History / Audit</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                </ul>

            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-60">
            <!-- Top Header -->
            <header class="bg-white h-16 flex items-center justify-between px-6 shadow-sm">
                <div class="flex items-center">
                    <button class="text-gray-500 focus:outline-none mr-4 cursor-pointer !rounded-button whitespace-nowrap">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <i class="fas fa-search text-gray-400"></i>
            </span>
                        <input type="text" placeholder="Search..." class="border-none bg-gray-100 rounded-lg pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 w-64" />
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-500 hover:text-gray-700 cursor-pointer !rounded-button whitespace-nowrap">
                        <i class="fas fa-cog text-xl"></i>
                    </button>
                    <button class="text-gray-500 hover:text-gray-700 cursor-pointer !rounded-button whitespace-nowrap">
                        <i class="far fa-question-circle text-xl"></i>
                    </button>
                    <button class="flex items-center cursor-pointer !rounded-button whitespace-nowrap">
                        <img src="https://readdy.ai/api/search-image?query=professional%20headshot%20of%20a%20business%20person%20with%20neutral%20expression%20on%20plain%20background%2C%20high%20quality%20portrait%2C%20professional%20looking&width=100&height=100&seq=avatar1&orientation=squarish" alt="User avatar" class="h-8 w-8 rounded-full object-cover" />
                    </button>
                </div>
            </header>

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
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Фото</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Аты</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Түрі</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Жасы</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Тұқымы</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Орналасқан жері</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Байланыс</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Әрекеттер</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                        <tr v-for="animal in adoptAnimals" :key="animal.id">
                            <td class="px-4 py-3">
                                <img :src="`/storage/${animal.photo_path}`" alt="pet" class="w-16 h-16 object-cover rounded" />
                            </td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ animal.pet_name }}</td>
                            <td class="px-4 py-3 capitalize">{{ animal.pet_type }}</td>
                            <td class="px-4 py-3">{{ animal.age }} жаста</td>
                            <td class="px-4 py-3">{{ animal.breed }}</td>
                            <td class="px-4 py-3">{{ animal.location }}</td>
                            <td class="px-4 py-3">
                                <div>
                                    <div class="font-medium">{{ animal.contact_name }}</div>
                                    <div class="text-sm text-gray-500">{{ animal.contact_phone }}</div>
                                    <div class="text-sm text-gray-500">{{ animal.contact_email }}</div>
                                </div>
                            </td>
                            <td><i class="fa-solid fa-trash"></i></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";
const adoptAnimals = ref([]);



onMounted(async () =>{
    {
        try {
            const response = await axios.get('/api/adopt-pet/show');
            adoptAnimals.value = response.data;
        }catch (error) {
            console.log(error);
        }
    }
});

</script>


<style scoped>

</style>
