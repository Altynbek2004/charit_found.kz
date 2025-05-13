<template>
    <div class="max-w-4xl mx-auto my-10 px-4">
        <!-- Loading State -->
        <div v-if="loading" class="text-center py-8 animate-pulse">
            <p class="text-blue-600">{{$t('details.loading')}}</p>
        </div>

        <!-- Error State -->
        <div v-else-if="error" class="text-center py-8">
            <p class="text-red-500 font-semibold">{{ error }}</p>
            <button
                @click="$router.go(-1)"
                class="mt-4 px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-all"
            >
                {{$t('details.back')}}
            </button>
        </div>

        <!-- Pet Details -->
        <div v-else class="bg-white rounded-lg shadow-xl overflow-hidden transition-all duration-500 ease-in-out transform hover:scale-105">
            <div class="md:flex">
                <!-- Pet Image -->
                <div class="md:w-1/2">
                    <div class="h-64 md:h-full bg-blue-50 flex items-center justify-center">
                        <img
                            v-if="pet.photoUrl"
                            :src="pet.photoUrl"
                            :alt="getPetTypeText()"
                            class="h-full w-full object-cover rounded-md transition-transform duration-300 ease-in-out hover:scale-105"
                        />
                        <div v-else class="flex items-center justify-center h-full w-full bg-gray-100 rounded-md">
                            <span class="text-gray-400">{{$t('recent.noPhoto')}}</span>
                        </div>
                    </div>
                </div>

                <!-- Pet Information -->
                <div class="md:w-1/2 p-6">
                    <h1 class="text-3xl font-bold mb-4 text-blue-600">{{ getPetTypeText() }}</h1>

                    <div class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div v-if="pet.breed" class="mb-2">
                                <div class="text-sm text-gray-600">{{$t('details.namePet')}}</div>
                                <div class="text-lg text-gray-800 font-semibold">{{ pet.namePet }}</div>
                            </div>
                            <div v-if="pet.breed" class="mb-2">
                                <div class="text-sm text-gray-600">{{$t('details.breed')}}</div>
                                <div class="text-lg text-gray-800">{{ pet.breed }}</div>
                            </div>

                            <div v-if="pet.gender" class="mb-2">
                                <div class="text-sm text-gray-600">{{$t('details.gender')}}</div>
                                <div class="text-lg text-gray-800">{{ getGenderText() }}</div>
                            </div>

                            <div v-if="pet.age" class="mb-2">
                                <div class="text-sm text-gray-600">{{$t('details.age')}}</div>
                                <div class="text-lg text-gray-800">{{ pet.age }}</div>
                            </div>

                            <div class="mb-2">
                                <div class="text-sm text-gray-600">{{$t('details.location1')}}</div>
                                <div class="text-lg text-gray-800">{{ pet.location }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Pet Description -->
                    <div v-if="pet.description" class="mb-6">
                        <h2 class="text-xl font-semibold text-blue-600 mb-2">{{$t('recent.description')}}</h2>
                        <p class="text-gray-700">{{ pet.description }}</p>
                    </div>

                    <!-- Contact Information -->
                    <div class="border-t pt-4">
                        <h2 class="text-xl font-semibold text-blue-600 mb-2">{{$t('details.contact')}}</h2>
                        <div class="text-sm text-gray-600">{{$t('details.name')}}</div>
                        <div class="mb-2 text-gray-800">{{ pet.contactName }}</div>

                        <div class="text-sm text-gray-600">{{$t('details.phone')}}</div>
                        <div class="mb-2 text-gray-800">{{ pet.contactPhone }}</div>

                        <div v-if="pet.contactEmail" class="mb-2">
                            <div class="text-sm text-gray-600">{{$t('details.email')}}</div>
                            <div class="text-gray-800">{{ pet.contactEmail }}</div>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-6">
                        <button
                            @click="$router.go(-1)"
                            class="px-6 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-300"
                        >
                            {{$t('details.back1')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        id: {
            type: [Number, String],
            required: true
        }
    },

    data() {
        return {
            pet: {},
            loading: true,
            error: null
        };
    },

    mounted() {
        this.fetchPetDetails();
    },

    methods: {
        fetchPetDetails() {
            this.loading = true;

            // Получаем токен из localStorage (или другого хранилища)
            const token = localStorage.getItem('token');  // Или используйте другой метод получения токена

            // Проверяем, есть ли токен
            if (token) {
                axios.get(`/adopt-pets/${this.id}`, {
                    headers: {
                        'Authorization': `Bearer ${token}`  // Добавляем токен в заголовок
                    }
                })
                    .then(response => {
                        this.pet = response.data.data;
                        this.loading = false;
                    })
                    .catch(error => {
                        console.error('Error fetching pet details:', error);
                        this.error = 'Не удалось загрузить информацию о животном';
                        this.loading = false;
                    });
            } else {
                // Если токен отсутствует
                console.error('Token is missing!');
                this.error = 'Токен не найден';
                this.loading = false;
            }
        },

        getPetTypeText() {
            if (this.pet.petType === 'other' && this.pet.otherPetType) {
                return this.pet.otherPetType;
            }

            const petTypes = {
                'cat': this.$t('recent.cat') || 'Кошка',
                'dog': this.$t('recent.dog') || 'Собака',
                'bird': this.$t('recent.bird') || 'Птица',
                'other': this.$t('recent.other') || 'Другое животное'
            };
            return petTypes[this.pet.petType] || 'Животное';
        },

        getGenderText() {
            const genders = {
                'male': this.$t('recent.gender1') ||'Самец',
                'female' : this.$t('recent.gender2') || 'Самка',
                'unknown': this.$t('recent.gender3') || 'Не определен'
            };

            return genders[this.pet.gender] || 'Не указан';
        },
    }
};
</script>


<style scoped>
.animate-pulse {
    animation: pulse 1.5s infinite ease-in-out;
}

@keyframes pulse {
    0% { opacity: 1; }
    50% { opacity: 0.5; }
    100% { opacity: 1; }
}
</style>
