<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <div class="fixed left-0 top-0 h-full w-60 bg-white shadow-md z-10">
            <!-- Logo -->
            <div class="flex items-center px-5 h-16 border-b border-gray-100">
                <i class="fas fa-cube text-indigo-500 text-xl mr-2"></i>
                <span class="font-bold text-lg text-gray-800">Charit Found</span>
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
                            href="/"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Lost animal / Потерянный животное</span>
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
                    <button class="text-gray-500 focus:outline-none mr-4 cursor-pointer">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                          <i class="fas fa-search text-gray-400"></i>
                        </span>
                        <input
                            type="text"
                            placeholder="Search..."
                            class="border-none bg-gray-100 rounded-lg pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 w-64"
                        />
                    </div>
                </div>

                <div class="relative">
                    <button @click="toggleDropdown" class="flex items-center cursor-pointer focus:outline-none">
                        <img
                            src="https://readdy.ai/api/search-image?query=professional%20headshot%20of%20a%20business%20person%20with%20neutral%20expression%20on%20plain%20background%2C%20high%20quality%20portrait%2C%20professional%20looking&width=100&height=100&seq=avatar1&orientation=squarish"
                            alt="User avatar"
                            class="h-8 w-8 rounded-full object-cover"
                        />
                    </button>

                    <!-- Dropdown -->
                    <div
                        v-if="isOpen"
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50"
                    >
                        <a href="" @click="profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Профиль</a>
                        <a href="" @click="logout" class="block px-4 py-2 text-red-600 hover:bg-red-100">Шығу</a>
                    </div>
                </div>
            </header>

            <div class="p-6 bg-gray-50 min-h-screen">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Приютение животное</h2>
                    </div>
                </div>
                <div class="overflow-x-auto bg-white rounded-lg shadow">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Фото</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Аты</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Жасы</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Тұқымы</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Орналасқан жері</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Байланыс</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Әрекеттер</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                        <tr v-for="animal in foundAnimals.data" :key="animal.id">
                            <td class="px-4 py-3">
                                <img :src="animal.photoUrl" alt="pet" class="w-16 h-16 object-cover rounded" />
                            </td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ animal.petType }}</td>
                            <td class="px-4 py-3 capitalize">{{ animal.age }} жаста</td>
                            <td class="px-4 py-3">{{ animal.breed }}</td>
                            <td class="px-4 py-3">{{ animal.location }}</td>
                            <td class="px-4 py-3">
                                <div>
                                    <div class="font-medium">{{ animal.contactName }}</div>
                                    <div class="text-sm text-gray-500">{{ animal.contactPhone }}</div>
                                    <div class="text-sm text-gray-500">{{ animal.contactEmail }}</div>
                                </div>
                            </td>
                            <td>
                                <svg
                                    @click="deleteAnimal(animal.id)"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="red"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="cursor-pointer hover:scale-110 transition-transform"
                                >
                                    <path d="M3 6h18"></path>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                </svg>
                            </td>
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
import {useRouter} from "vue-router";
const foundAnimals = ref({ data: [] });



const router = useRouter();
const profile = () => {
    router.push('/profile');
}

const logout = async () => {
    try {
        const token = localStorage.getItem('token');

        await axios.post('/api/logout', {}, {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        });

        localStorage.removeItem('token');

        window.location.href = '/login';

    } catch (error) {
        console.error('Logout error:', error);
        alert('Шығу кезінде қате орын алды');
    }
};



const isOpen = ref(false)
const toggleDropdown = () => {
    isOpen.value = !isOpen.value
}


onMounted(async () =>{
    {
        try {
            const response = await axios.get('/api/found-pets');
            foundAnimals.value = response.data;
            console.log(foundAnimals.value);
        }catch (error) {
            console.log(error);
        }
    }
});

const deleteAnimal = async (animalId) => {
    if (!confirm('Сіз расында осы жануарды жойғыңыз келе ме?')) return;

    try {
        const token = localStorage.getItem('token');
        await axios.delete(`/api/found-pets/${animalId}`, {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        });

        foundAnimals.value.data = foundAnimals.value.data.filter((animal) => animal.id !== animalId);

        alert('Жануар сәтті жойылды');
    } catch (error) {
        console.error(error);
        alert('Жою кезінде қате орын алды');
    }
};


</script>


<style scoped>

</style>
