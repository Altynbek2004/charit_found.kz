<template>
    <div class="max-w-5xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center text-[#00bfff] mb-6 transition-all duration-300">
            {{ $t('h1.adopt') }}
        </h1>

        <div class="flex justify-end mb-6">
            <button
                @click="showAddFormAdopt = true"
                class="bg-[#00bfff] text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition-colors duration-200 hover:bg-[#009fd6] focus:outline-none focus:ring-2 focus:ring-[#00bfff] focus:ring-offset-2"
            >
                {{ $t('h1.addAnAd') }}
            </button>
        </div>

        <div class="flex justify-center space-x-8 border-b mb-8">
            <button
                v-for="(tab, index) in tabs"
                :key="index"
                :class="[
                    'pb-3 font-medium transition-colors duration-300',
                    activeTabIndex === index
                        ? 'border-b-4 border-[#00bfff] text-[#333]'
                        : 'text-gray-500 hover:text-[#00bfff]'
                ]"
                @click="activeTabIndex = index"
            >
                {{ tab }}
            </button>
        </div>

        <div
            v-for="(tabName, tabIndex) in tabs"
            :key="tabName"
            v-show="activeTabIndex === tabIndex"
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8"
        >
            <div v-if="loading" class="text-center py-12 col-span-3">
                <p class="text-lg text-[#00bfff]">{{ $t('recent.loading') }}</p>
            </div>
            <div
                v-else-if="getPetsForActiveTab.length === 0"
                class="text-center py-12 col-span-3"
            >
                <p class="text-lg text-gray-600">{{ $t('recent.endLoading') }}</p>
            </div>
            <div
                v-else
                v-for="pet in getPetsForActiveTab"
                :key="pet.id"
                class="bg-white p-6 rounded-lg text-center shadow-lg hover:shadow-xl transition-shadow duration-300 border border-transparent hover:border-[#00bfff] transform hover:scale-105"
            >
                <div>
                    <img
                        v-if="pet.photoUrl"
                        :src="pet.photoUrl"
                        :alt="getPetTypeTextAdopt(pet)"
                        class="w-full h-48 object-cover rounded-md mb-3"
                    />
                    <div v-else class="flex items-center justify-center h-48 bg-gray-100 rounded-md mb-3">
                        <span class="text-gray-400">{{ $t('recent.noPhoto') }}</span>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-medium text-[#00bfff] mb-2">{{ pet.namePet }}</h4>
                    <p class="text-sm text-gray-600">{{ pet.location }}</p>
                    <p class="text-sm text-gray-600">{{ pet.breed }}</p>
                    <button
                        class="mt-4 w-full px-4 py-2 bg-[#00bfff] text-white rounded-md hover:bg-[#009fd6] transition-colors"
                        @click="viewDetailsAdopt(pet.id)"
                    >
                        {{ $t('recent.more') }}
                    </button>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-8">
            <button class="bg-[#d6f6ff] text-[#00bfff] font-semibold px-8 py-3 rounded-full shadow-lg hover:bg-[#c0e9ff] transition-colors">
                {{ $t('h1.still') }}
            </button>
        </div>
    </div>

    <!-- Add pet form modal -->
    <div
        v-if="showAddFormAdopt"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 transition-opacity duration-300 ease-in-out"
    >
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-screen overflow-y-auto transform transition-all duration-500 ease-in-out scale-95 hover:scale-100">
            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-3xl font-bold text-blue-600">{{ $t('recent.addAnAd') }}</h3>
                    <button
                        @click="showAddFormAdopt = false"
                        class="text-gray-400 hover:text-blue-500 transition-colors duration-200"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form @submit.prevent="submitFormAdopt" class="space-y-5">
                    <!-- Pet Info -->
                    <div>
                        <label for="petType" class="block text-sm font-medium text-blue-700 mb-1">{{ $t('recent.typePet') }}</label>
                        <select
                            id="petType"
                            v-model="formAdopt.petType"
                            class="w-full px-4 py-2 border border-blue-300 rounded-xl focus:ring-blue-500 focus:border-blue-500 hover:border-blue-500 transition"
                            required
                        >
                            <option value="" disabled selected>{{ $t('recent.choosePet') }}</option>
                            <option value="cat">{{ $t('recent.cat') }}</option>
                            <option value="dog">{{ $t('recent.dog') }}</option>
                            <option value="bird">{{ $t('recent.bird') }}</option>
                            <option value="other">{{ $t('recent.other') }}</option>
                        </select>
                    </div>

                    <div v-if="formAdopt.petType === 'other'">
                        <label for="otherPetType" class="block text-sm font-medium text-blue-700 mb-1">{{ $t('recent.specifyPet') }}</label>
                        <input
                            type="text"
                            id="otherPetType"
                            v-model="formAdopt.otherPetType"
                            class="w-full px-4 py-2 border border-blue-300 rounded-xl focus:ring-blue-500 focus:border-blue-500 transition"
                            required
                        />
                    </div>

                    <div>
                        <label for="pet_name" class="block text-sm font-medium text-blue-700 mb-1">{{ $t('h1.namePet') }}</label>
                        <input
                            type="text"
                            id="pet_name"
                            v-model="formAdopt.namePet"
                            class="w-full px-4 py-2 border border-blue-300 rounded-xl focus:ring-blue-500 focus:border-blue-500 transition"
                        />
                    </div>

                    <div>
                        <label for="breed" class="block text-sm font-medium text-blue-700 mb-1">{{ $t('h1.breed') }}</label>
                        <input
                            type="text"
                            id="breed"
                            v-model="formAdopt.breed"
                            class="w-full px-4 py-2 border border-blue-300 rounded-xl focus:ring-blue-500 focus:border-blue-500 transition"
                        />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="gender" class="block text-sm font-medium text-blue-700 mb-1">{{ $t('recent.gender') }}</label>
                            <select
                                id="gender"
                                v-model="formAdopt.gender"
                                class="w-full px-4 py-2 border border-blue-300 rounded-xl focus:ring-blue-500 focus:border-blue-500 hover:border-blue-500 transition"
                            >
                                <option value="" disabled selected>{{ $t('recent.chooseGender') }}</option>
                                <option value="male">{{ $t('recent.gender1') }}</option>
                                <option value="female">{{ $t('recent.gender2') }}</option>
                            </select>
                        </div>

                        <div>
                            <label for="age" class="block text-sm font-medium text-blue-700 mb-1">{{ $t('h1.age') }}</label>
                            <input
                                type="text"
                                id="age"
                                v-model="formAdopt.age"
                                class="w-full px-4 py-2 border border-blue-300 rounded-xl focus:ring-blue-500 focus:border-blue-500 transition"
                                :placeholder="$t('recent.agePlaceholder')"
                            />
                        </div>
                    </div>

                    <!-- Location Info -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-blue-700 mb-1">{{ $t('h1.location') }}</label>
                        <input
                            type="text"
                            id="location"
                            v-model="formAdopt.location"
                            class="w-full px-4 py-2 border border-blue-300 rounded-xl focus:ring-blue-500 focus:border-blue-500 transition"
                            required
                            :placeholder="$t('recent.locationPlaceholder')"
                        />
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-blue-700 mb-1">{{ $t('recent.description') }}</label>
                        <textarea
                            id="description"
                            v-model="formAdopt.description"
                            rows="4"
                            class="w-full px-4 py-2 border border-blue-300 rounded-xl focus:ring-blue-500 focus:border-blue-500 transition"
                            :placeholder="$t('recent.descriptionPlaceholder')"
                        ></textarea>
                    </div>

                    <!-- Photo Upload -->
                    <div>
                        <label for="photo" class="block text-sm font-medium text-blue-700 mb-1">{{ $t('recent.photoPet') }}</label>
                        <input
                            type="file"
                            id="photo"
                            ref="fileInput"
                            @change="handleFileUploadAdopt"
                            class="w-full px-4 py-2 border border-blue-300 rounded-xl focus:ring-blue-500 focus:border-blue-500 transition"
                            accept="image/*"
                        />
                        <div v-if="imagePreviewAdopt" class="mt-3">
                            <img :src="imagePreviewAdopt" alt="Preview" class="h-48 object-contain border-2 border-blue-100 rounded-xl shadow-md" />
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <label for="contactName" class="block text-sm font-medium text-blue-700 mb-1">{{ $t('recent.contactName') }}</label>
                        <input
                            type="text"
                            id="contactName"
                            v-model="formAdopt.contactName"
                            class="w-full px-4 py-2 border border-blue-300 rounded-xl focus:ring-blue-500 focus:border-blue-500 transition"
                            required
                        />
                    </div>

                    <div>
                        <label for="contactPhone" class="block text-sm font-medium text-blue-700 mb-1">{{ $t('recent.contactPhone') }}</label>
                        <input
                            type="tel"
                            id="contactPhone"
                            v-model="formAdopt.contactPhone"
                            class="w-full px-4 py-2 border border-blue-300 rounded-xl focus:ring-blue-500 focus:border-blue-500 transition"
                            required
                        />
                    </div>

                    <div>
                        <label for="contactEmail" class="block text-sm font-medium text-blue-700 mb-1">{{ $t('recent.contactEmail') }}</label>
                        <input
                            type="email"
                            id="contactEmail"
                            v-model="formAdopt.contactEmail"
                            class="w-full px-4 py-2 border border-blue-300 rounded-xl focus:ring-blue-500 focus:border-blue-500 transition"
                        />
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button
                            type="submit"
                            class="w-full px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-105"
                            :disabled="submittingAdopt"
                        >
                            {{ submittingAdopt ? $t('recent.sending') : $t('recent.postAnAd') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Success modal -->
    <div
        v-if="showSuccessAdopt"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50"
    >
        <div class="modal-success-enter bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 text-center transform transition-transform duration-300">
            <div class="mb-4 text-[#00bfff]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-[#00bfff] mb-2">{{ $t('recent.thanks') }}</h3>
            <p class="text-lg text-gray-700 mb-6">{{ $t('recent.postedSuccess') }}</p>
            <button
                @click="closeSuccessAdopt"
                class="px-6 py-3 bg-[#00bfff] text-white font-semibold rounded-lg hover:bg-[#00bfff] hover:shadow-xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#00bfff] focus:ring-offset-2"
            >
                {{ $t('recent.close') }}
            </button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            loading: true,
            showAddFormAdopt:false,
            submittingAdopt:false,
            showSuccessAdopt:false,
            imagePreviewAdopt:null,
            formAdopt: {
                petType: '',
                otherPetType: '',
                breed: '',
                gender: '',
                age: '',
                location: '',
                description: '',
                namePet: '',
                photo: null,
                contactName: '',
                contactPhone: '',
                contactEmail: ''
            },
            recentPetsDog: [],
            recentPetsCat: [],
            recentPetsBird: [],
            recentPetsOther: [],
            activeTabIndex: 0,
            errors: {} // Added to store validation errors
        };
    },
    mounted() {
        this.fetchRecentPetsAdopt();
    },
    computed: {
        tabs() {
            return [
                this.$t('tabs1.tabs2'),
                this.$t('tabs1.tabs3'),
                this.$t('tabs1.tabs4'),
                this.$t('tabs1.tabs5')
            ];
        },
        activeTab() {
            return this.tabs[this.activeTabIndex];
        },
        // Get pets for the currently active tab
        getPetsForActiveTab() {
            const petsArrays = [
                this.recentPetsDog,    // index 0 - Иттер (Dogs)
                this.recentPetsCat,    // index 1 - Мысықтар (Cats)
                this.recentPetsBird,   // index 2 - Құстар (Birds)
                this.recentPetsOther   // index 3 - Басқалар (Others)
            ];

            return petsArrays[this.activeTabIndex] || [];
        }
    },
    methods: {
        submitFormAdopt() {
            this.submittingAdopt = true;
            this.errors = {}; // Reset errors before submitting

            // Create FormData for file upload
            const formData = new FormData();
            formData.append('petType', this.formAdopt.petType);
            formData.append('otherPetType', this.formAdopt.otherPetType);
            formData.append('breed', this.formAdopt.breed);
            formData.append('gender', this.formAdopt.gender);
            formData.append('age', this.formAdopt.age);
            formData.append('location', this.formAdopt.location);
            formData.append('description', this.formAdopt.description);
            formData.append('namePet', this.formAdopt.namePet);

            if (this.formAdopt.photo) {
                formData.append('photo', this.formAdopt.photo);
            }

            formData.append('contactName', this.formAdopt.contactName);
            formData.append('contactPhone', this.formAdopt.contactPhone);
            formData.append('contactEmail', this.formAdopt.contactEmail);

            const token = localStorage.getItem('token');
            // Send data to Laravel backend
            axios.post('/adopt-pets', formData, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log('Form submitted successfully:', response.data);
                    this.submittingAdopt = false;
                    this.showAddFormAdopt = false;
                    this.showSuccessAdopt = true;

                    // Reset form data
                    this.formAdopt = {
                        namePet: '',
                        petType: '',
                        otherPetType: '',
                        breed: '',
                        gender: '',
                        age: '',
                        location: '',
                        description: '',
                        photo: null,
                        contactName: '',
                        contactPhone: '',
                        contactEmail: ''
                    };

                    // Refresh pet listings
                    this.fetchRecentPetsAdopt();

                    // Reset file input
                    this.imagePreviewAdopt = null;
                    if (this.$refs.fileInput) {
                        this.$refs.fileInput.value = '';
                    }
                })
                .catch(error => {
                    console.error('Error submitting form:', error.response ? error.response.data : error);
                    this.submittingAdopt = false;

                    // Handle validation errors
                    if (error.response && error.response.status === 422) {
                        this.errors = error.response.data.errors;
                        alert(this.$t('recent.validationError'));
                    } else {
                        // Handle other errors
                        alert(this.$t('recent.generalError') || 'Произошла ошибка при отправке формы. Пожалуйста, попробуйте позже.');
                    }
                });
        },

        handleFileUploadAdopt(event) {
            const file = event.target.files[0];
            if (file) {
                this.formAdopt.photo = file;
                // Create image preview
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imagePreviewAdopt = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },

        closeSuccessAdopt() {
            this.showSuccessAdopt = false;
        },

        fetchRecentPetsAdopt() {
            this.loading = true;

            axios.get('/api/adopt-recent-pets')
                .then(response => {
                    this.recentPetsDog = response.data.recentPetsDog || [];
                    this.recentPetsCat = response.data.recentPetsCat || [];
                    this.recentPetsBird = response.data.recentPetsBird || [];
                    this.recentPetsOther = response.data.recentPetsOther || [];
                    this.loading = false;
                })
                .catch(error => {
                    console.error('Error fetching recent pets:', error);
                    alert(this.$t('recent.loadError') || 'Не удалось загрузить объявления');
                    this.loading = false;
                });
        },

        getPetTypeTextAdopt(pet) {
            if (pet.petType === 'other' && pet.otherPetType) {
                return pet.otherPetType;
            }

            const petTypes = {
                'cat': this.$t('recent.cat') || 'Кошка',
                'dog': this.$t('recent.dog') || 'Собака',
                'bird': this.$t('recent.bird') || 'Птица',
                'other': this.$t('recent.other') || 'Другое животное'
            };

            return petTypes[pet.petType] || this.$t('recent.animal') || 'Животное';
        },

        formatDateAdopt(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString(this.$i18n.locale || 'ru-RU', options);
        },

        viewDetailsAdopt(petId) {
            // Получаем токен (предполагаем, что он хранится в локальном хранилище)
            const token = localStorage.getItem('token');  // Или используйте другой метод получения токена

            // Проверяем, есть ли токен
            if (token) {
                // Если роутер доступен, отправляем запрос с токеном в заголовке
                if (this.$router) {
                    // Добавляем заголовок Authorization в запрос
                    this.$router.push({
                        name: 'adopt-pet-details',
                        params: { id: petId },
                        query: { token: token }  // Передаем токен через query (если нужно в URL)
                    });
                } else {
                    // Фоллбек на обычный переход, если роутера нет
                    window.location.href = `/pets/${petId}?token=${token}`;  // Передаем токен через query в URL
                }
            } else {
                // Токен не найден
                console.error('Token is missing!');
                // Дополнительная обработка ошибки (например, редирект на страницу входа)
            }
        }

    }
};
</script>

<style scoped>
/* Анимация появления модалки */
@keyframes fadeInScale {
    0% {
        opacity: 0;
        transform: scale(0.95);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

.modal-enter {
    animation: fadeInScale 0.3s ease-out;
}

/* Кастомный скролл для формы */
.modal-content::-webkit-scrollbar {
    width: 6px;
}

.modal-content::-webkit-scrollbar-thumb {
    background-color: #00bfff;
    border-radius: 3px;
}

@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px) scale(0.98);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.modal-success-enter {
    animation: fadeInUp 0.3s ease-out;
}
</style>
