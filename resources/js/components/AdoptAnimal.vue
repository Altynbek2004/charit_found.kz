<template>
    <div class="max-w-5xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-6">Приютить животное</h1>

        <div class="flex justify-end mb-4">
            <button class="bg-blue-100 text-blue-900 font-semibold px-4 py-2 rounded shadow">
                добавить объявление
            </button>
        </div>

        <div class="flex justify-center space-x-8 border-b mb-8">
            <button
                v-for="(tab, index) in tabs"
                :key="index"
                :class="['pb-2 font-medium', activeTab === tab ? 'border-b-4 border-blue-500 text-black' : 'text-gray-500']"
                @click="activeTab = tab"
            >
                {{ tab }}
            </button>
        </div>
        <div v-bind:class="{'active' : activeTab == 'Собаки'}" v-if="activeTab === 'Собаки'" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    Page Собаки
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
        </div>
        <div v-bind:class="{'active' : activeTab == 'Кошки'}" v-if="activeTab === 'Кошки'" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    Page Кошки
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
        </div>
        <div v-bind:class="{'active' : activeTab == 'Другие'}" v-if="activeTab === 'Другие'" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                   Page Другие
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
        </div>
        <div v-bind:class="{'active' : activeTab == 'Временно'}" v-if="activeTab === 'Временно'" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    Page Временно
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg text-center hover:shadow-lg transition-shadow duration-300 border border-transparent hover:border-blue-300"
            >
                <img src="/storage/app/public/images/dogs.png" alt="dog" class="w-full h-48 object-cover rounded-md mb-3" />
                <p class="text-sm break-words">
                    йцукенгшщзхъфывапролдячсмитьбю№йцукенгшщзхъфывапролдячсмитьбю
                </p>
            </div>
        </div>
        <div class="flex justify-center mt-8">
            <button class="bg-blue-200 text-blue-900 font-semibold px-6 py-2 rounded shadow">
                еще
            </button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            tabs: ['Собаки', 'Кошки', 'Другие', 'Временно'],
            activeTab: 'Собаки'
        }
    },
    methods: {
        async createProduct() {
            await axios.post('/api/products', this.product);
            this.$router.push('/');
        },
    },
};
</script>

<style scoped>

</style>
