<template>
    <div class="max-w-4xl mx-auto my-10 px-4">
        <!-- Loading State -->
        <div v-if="loading" class="text-center py-8 animate__animated animate__fadeIn">
            <p class="text-blue-600">{{$t('details.loading')}}</p>
        </div>

        <!-- Error State -->
        <div v-else-if="error" class="text-center py-8 animate__animated animate__fadeIn">
            <p class="text-red-500">{{ error }}</p>
            <button
                @click="$router.go(-1)"
                class="mt-4 px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-all duration-300"
            >
                {{$t('details.back')}}
            </button>
        </div>

        <!-- Pet Details -->
        <div v-else class="bg-white rounded-lg shadow-lg overflow-hidden animate__animated animate__fadeIn">
            <div class="md:flex">
                <!-- Pet Image -->
                <div class="md:w-1/2">
                    <div class="h-64 md:h-full bg-gray-200 flex items-center justify-center transition-all duration-500 hover:scale-105">
                        <img
                            v-if="pet.photoUrl"
                            :src="pet.photoUrl"
                            :alt="getPetTypeText()"
                            class="h-full w-full object-cover rounded-lg transition-transform duration-500 hover:scale-110"
                        />
                        <div v-else class="flex items-center justify-center h-full w-full">
                            <span class="text-gray-400">{{$t('recent.noPhoto')}}</span>
                        </div>
                    </div>
                </div>

                <!-- Pet Info -->
                <div class="md:w-1/2 p-6">
                    <h1 class="text-3xl font-bold text-blue-600 mb-4">{{ getPetTypeText() }}</h1>

                    <div class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div v-if="pet.breed" class="mb-2">
                                <div class="text-sm text-gray-600">{{$t('details.breed')}}</div>
                                <div class="font-medium text-blue-500">{{ pet.breed }}</div>
                            </div>

                            <div v-if="pet.gender" class="mb-2">
                                <div class="text-sm text-gray-600">{{$t('details.gender')}}</div>
                                <div class="font-medium text-blue-500">{{ getGenderText() }}</div>
                            </div>

                            <div v-if="pet.age" class="mb-2">
                                <div class="text-sm text-gray-600">{{$t('details.age')}}</div>
                                <div class="font-medium text-blue-500">{{ pet.age }}</div>
                            </div>

                            <div class="mb-2">
                                <div class="text-sm text-gray-600">{{$t('details.location')}}</div>
                                <div class="font-medium text-blue-500">{{ pet.location }}</div>
                            </div>

                            <div class="mb-2">
                                <div class="text-sm text-gray-600">{{$t('details.foundDate')}}</div>
                                <div class="font-medium text-blue-500">{{ formatDate(pet.foundDate) }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Pet Description -->
                    <div v-if="pet.description" class="mb-6">
                        <h2 class="text-lg font-semibold mb-2 text-blue-600">{{$t('recent.description')}}</h2>
                        <p class="text-gray-700">{{ pet.description }}</p>
                    </div>

                    <!-- Contact Info -->
                    <div class="border-t pt-4">
                        <h2 class="text-lg font-semibold mb-2 text-blue-600">{{$t('details.contact')}}</h2>
                        <div class="text-sm text-gray-600">{{$t('details.name')}}</div>
                        <div class="font-medium text-gray-700 mb-2">{{ pet.contactName }}</div>

                        <div class="text-sm text-gray-600">{{$t('details.phone')}}</div>
                        <div class="font-medium text-gray-700 mb-2">{{ pet.contactPhone }}</div>

                        <div v-if="pet.contactEmail" class="mb-2">
                            <div class="text-sm text-gray-600">{{$t('details.email')}}</div>
                            <div class="font-medium text-gray-700">{{ pet.contactEmail }}</div>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-6">
                        <button
                            @click="$router.go(-1)"
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-300"
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

            // Получаем токен авторизации (например, из localStorage)
            const token = localStorage.getItem('token'); // Замените на нужный путь хранения токена

            axios.get(`/found-pets/${this.id}`, {
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
        },


        getPetTypeText() {
            if (this.pet.petType === 'other' && this.pet.otherPetType) {
                return this.pet.otherPetType;
            }

            const petTypes = {
                'cat': this.$t('recent.cat'),
                'dog': this.$t('recent.dog'),
                'bird': this.$t('recent.bird'),
                'other': this.$t('recent.other')
            };

            return petTypes[this.pet.petType] || 'Животное';
        },

        getGenderText() {
            const genders = {
                'male': this.$t('recent.gender1'),
                'female': this.$t('recent.gender2'),
                'unknown': this.$t('recent.gender3')
            };

            return genders[this.pet.gender] || 'Не указан';
        },

        formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString(this.$i18n.locale || 'ru-RU', options);
        }
    }
};
</script>
