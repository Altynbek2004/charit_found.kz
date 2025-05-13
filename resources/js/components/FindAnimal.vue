<template>
    <div class="min-h-screen bg-blue-100">
        <!-- Header -->
        <header class="container mx-auto py-12 px-4">
            <h1 class="text-5xl font-bold text-center text-blue-600 animate-fadeIn">{{ $t('header.find') }}</h1>
            <h2 class="text-3xl text-center text-gray-700 mt-6 animate-fadeIn">{{ $t('header.help') }}</h2>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto py-10 ">
            <!-- Info Section -->
            <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-2xl p-8 mb-10 animate-zoomIn">
                <p class="text-lg text-center text-gray-600 mb-6">{{ $t('main.context') }}</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-blue-50 p-6 rounded-lg shadow-md transform transition-all hover:scale-105 hover:shadow-xl">
                        <h3 class="text-xl font-semibold text-blue-600 mb-4">{{ $t('main.works') }}</h3>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-700">
                            <li>{{ $t('main.work1') }}</li>
                            <li>{{ $t('main.work2') }}</li>
                            <li>{{ $t('main.work3') }}</li>
                            <li>{{ $t('main.work4') }}</li>
                        </ol>
                    </div>

                    <div class="bg-blue-50 p-6 rounded-lg shadow-md transform transition-all hover:scale-105 hover:shadow-xl">
                        <h3 class="text-xl font-semibold text-blue-600 mb-4">{{ $t('main.important') }}</h3>
                        <ul class="list-disc pl-5 space-y-2 text-gray-700">
                            <li>{{ $t('main.important1') }}</li>
                            <li>{{ $t('main.important2') }}</li>
                            <li>{{ $t('main.important3') }}</li>
                            <li>{{ $t('main.important4') }}</li>
                            <li>{{ $t('main.important5') }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Recent Ads Section -->
            <div class="max-w-6xl mx-auto mb-12">
                <h3 class="text-3xl font-semibold text-center text-gray-800 mb-8 animate-fadeIn">{{ $t('recent.recentAnAd') }}</h3>

                <div v-if="loading" class="text-center py-8">
                    <p>{{ $t('recent.loading') }}</p>
                </div>

                <div v-else-if="recentPets.length === 0" class="text-center py-8">
                    <p>{{ $t('recent.endLoading') }}</p>
                </div>

                <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div v-for="pet in recentPets" :key="pet.id" class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl animate-cardAppear">
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            <img
                                v-if="pet.photoUrl"
                                :src="pet.photoUrl"
                                :alt="getPetTypeText(pet)"
                                class="h-full w-full object-cover"
                            />
                            <div v-else class="flex items-center justify-center h-full w-full">
                                <span class="text-gray-400">{{ $t('recent.noPhoto') }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-lg font-semibold text-blue-600">{{ getPetTypeText(pet) }}</h4>
                            <p class="text-sm text-gray-600">{{ pet.location }}</p>
                            <p class="text-sm text-gray-600">{{ formatDate(pet.foundDate) }}</p>
                            <button
                                class="mt-4 w-full px-5 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors transform hover:scale-105"
                                @click="viewDetails(pet.id)"
                            >
                                {{ $t('recent.more') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Button -->
            <div class="text-center mb-12">
                <button
                    @click="showAddForm = true"
                    class="inline-block px-8 py-4 bg-blue-600 text-white font-medium text-lg rounded-xl shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all transform hover:scale-105"
                >
                    {{ $t('recent.addAnAd') }}
                </button>
            </div>
        </main>


        <!-- Add Form Modal -->
        <div
            v-if="showAddForm"
            class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center p-4 z-50 animate-fade-in"
        >
            <div
                class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-screen overflow-y-auto transform transition-all duration-500 scale-100 animate-slide-up"
            >
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-3xl font-bold text-blue-600">{{ $t('recent.addAnAd') }}</h3>
                        <button
                            @click="showAddForm = false"
                            class="text-gray-400 hover:text-red-500 transition-transform transform hover:scale-125"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form @submit.prevent="submitForm" class="space-y-6 p-6 bg-white rounded-2xl shadow-xl animate-fade-in">
                        <!-- Pet Info -->
                        <div>
                            <label for="petType" class="block text-sm font-semibold text-blue-600 mb-1">{{ $t('recent.typePet') }}</label>
                            <select
                                id="petType"
                                v-model="form.petType"
                                class="w-full px-4 py-2 border border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200"
                                required
                            >
                                <option value="" disabled selected>{{ $t('recent.choosePet') }}</option>
                                <option value="cat">{{ $t('recent.cat') }}</option>
                                <option value="dog">{{ $t('recent.dog') }}</option>
                                <option value="bird">{{ $t('recent.bird') }}</option>
                                <option value="other">{{ $t('recent.other') }}</option>
                            </select>
                        </div>

                        <div v-if="form.petType === 'other'" class="animate-slide-in">
                            <label for="otherPetType" class="block text-sm font-semibold text-blue-600 mb-1">{{ $t('recent.specifyPet') }}</label>
                            <input
                                type="text"
                                id="otherPetType"
                                v-model="form.otherPetType"
                                class="w-full px-4 py-2 border border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200"
                                required
                            />
                        </div>

                        <div>
                            <label for="breed" class="block text-sm font-semibold text-blue-600 mb-1">{{ $t('recent.breed') }}</label>
                            <input
                                type="text"
                                id="breed"
                                v-model="form.breed"
                                class="w-full px-4 py-2 border border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200"
                            />
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="gender" class="block text-sm font-semibold text-blue-600 mb-1">{{ $t('recent.gender') }}</label>
                                <select
                                    id="gender"
                                    v-model="form.gender"
                                    class="w-full px-4 py-2 border border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200"
                                >
                                    <option value="" disabled selected>{{ $t('recent.chooseGender') }}</option>
                                    <option value="male">{{ $t('recent.gender1') }}</option>
                                    <option value="female">{{ $t('recent.gender2') }}</option>
                                    <option value="unknown">{{ $t('recent.gender3') }}</option>
                                </select>
                            </div>

                            <div>
                                <label for="age" class="block text-sm font-semibold text-blue-600 mb-1">{{ $t('recent.age') }}</label>
                                <input
                                    type="text"
                                    id="age"
                                    v-model="form.age"
                                    class="w-full px-4 py-2 border border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200"
                                    :placeholder="$t('recent.agePlaceholder')"
                                />
                            </div>
                        </div>

                        <!-- Location Info -->
                        <div>
                            <label for="location" class="block text-sm font-semibold text-blue-600 mb-1">{{ $t('recent.location') }}</label>
                            <input
                                type="text"
                                id="location"
                                v-model="form.location"
                                class="w-full px-4 py-2 border border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200"
                                required
                                :placeholder="$t('recent.locationPlaceholder')"
                            />
                        </div>

                        <div>
                            <label for="date" class="block text-sm font-semibold text-blue-600 mb-1">{{ $t('recent.date') }}</label>
                            <input
                                type="date"
                                id="date"
                                v-model="form.date"
                                class="w-full px-4 py-2 border border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200"
                                required
                            />
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-semibold text-blue-600 mb-1">{{ $t('recent.description') }}</label>
                            <textarea
                                id="description"
                                v-model="form.description"
                                rows="4"
                                class="w-full px-4 py-2 border border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200 resize-none"
                                :placeholder="$t('recent.descriptionPlaceholder')"
                            ></textarea>
                        </div>

                        <!-- Photo Upload -->
                        <div>
                            <label for="photo" class="block text-sm font-semibold text-blue-600 mb-1">{{ $t('recent.photoPet') }}</label>
                            <input
                                type="file"
                                id="photo"
                                ref="fileInput"
                                @change="handleFileUpload"
                                class="w-full px-4 py-2 border border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200 bg-blue-50 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700"
                                accept="image/*"
                            />
                            <div v-if="imagePreview" class="mt-2">
                                <img :src="imagePreview" alt="Preview" class="h-40 object-contain rounded-xl border border-blue-100 shadow-sm animate-fade-in" />
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div>
                            <label for="contactName" class="block text-sm font-semibold text-blue-600 mb-1">{{ $t('recent.contactName') }}</label>
                            <input
                                type="text"
                                id="contactName"
                                v-model="form.contactName"
                                class="w-full px-4 py-2 border border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200"
                                required
                            />
                        </div>

                        <div>
                            <label for="contactPhone" class="block text-sm font-semibold text-blue-600 mb-1">{{ $t('recent.contactPhone') }}</label>
                            <input
                                type="tel"
                                id="contactPhone"
                                v-model="form.contactPhone"
                                class="w-full px-4 py-2 border border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200"
                                required
                            />
                        </div>

                        <div>
                            <label for="contactEmail" class="block text-sm font-semibold text-blue-600 mb-1">{{ $t('recent.contactEmail') }}</label>
                            <input
                                type="email"
                                id="contactEmail"
                                v-model="form.contactEmail"
                                class="w-full px-4 py-2 border border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200"
                            />
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button
                                type="submit"
                                class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300 transform hover:scale-[1.02] active:scale-95"
                                :disabled="submitting"
                            >
                                {{ submitting ? $t('recent.sending') : $t('recent.postAnAd') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- Success Modal -->
        <div
            v-if="showSuccess"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 animate-fadeIn"
        >
            <div
                class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 text-center border-t-4 border-blue-400 transform scale-90 animate-zoomIn transition-all duration-300"
            >
                <div class="mb-4 text-blue-500">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-20 w-20 mx-auto animate-bounce-slow"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $t('recent.thanks') }}</h3>
                <p class="text-lg text-gray-600 mb-6">{{ $t('recent.postedSuccess') }}</p>
                <button
                    @click="closeSuccess"
                    class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2"
                >
                    {{ $t('recent.close') }}
                </button>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'FoundPetPage',
    data() {
        return {
            showAddForm: false,
            showSuccess: false,
            submitting: false,
            imagePreview: null,
            loading: true,
            error: null,
            recentPets: [],
            form: {
                petType: '',
                otherPetType: '',
                breed: '',
                gender: '',
                age: '',
                location: '',
                date: '',
                description: '',
                photo: null,
                contactName: '',
                contactPhone: '',
                contactEmail: ''
            }
        }
    },
    mounted() {
        this.fetchRecentPets();
    },
    methods: {
        submitForm() {
            this.submitting = true;

            // Create FormData for file upload
            const formData = new FormData();
            formData.append('petType', this.form.petType);
            formData.append('otherPetType', this.form.otherPetType);
            formData.append('breed', this.form.breed);
            formData.append('gender', this.form.gender);
            formData.append('age', this.form.age);
            formData.append('location', this.form.location);
            formData.append('date', this.form.date);
            formData.append('description', this.form.description);

            if (this.form.photo) {
                formData.append('photo', this.form.photo);
            }

            formData.append('contactName', this.form.contactName);
            formData.append('contactPhone', this.form.contactPhone);
            formData.append('contactEmail', this.form.contactEmail);

            const token = localStorage.getItem('token');

            console.log(token)  ;                                             9
            // Send data to Laravel backend
            axios.post('/found-pets', formData, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log('Form submitted successfully:', response.data);
                    this.submitting = false;
                    this.showAddForm = false;
                    this.showSuccess = true;

                    // Reset form data
                    this.form = {
                        petType: '',
                        otherPetType: '',
                        breed: '',
                        gender: '',
                        age: '',
                        location: '',
                        date: '',
                        description: '',
                        photo: null,
                        contactName: '',
                        contactPhone: '',
                        contactEmail: ''
                    };
                    this.imagePreview = null;
                    if (this.$refs.fileInput) {
                        this.$refs.fileInput.value = '';
                    }
                    this.fetchRecentPets();
                })
                .catch(error => {
                    console.error('Error submitting form:', error.response ? error.response.data : error);
                    this.submitting = false;
                    // Handle validation errors
                    if (error.response && error.response.status === 422) {
                        // You can handle validation errors here
                        this.errors = error.response.data.errors;
                    } else {
                        // Handle other errors
                        alert('Произошла ошибка при отправке формы. Пожалуйста, попробуйте позже.');
                    }
                });
        },

// Add this method to handle file upload
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.form.photo = file;
                // Create image preview
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imagePreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        closeSuccess() {
            this.showSuccess = false;
        },
        fetchRecentPets() {
            this.loading = true;

            axios.get('/api/recent-pets')
                .then(response => {
                    this.recentPets = response.data.data;
                    this.loading = false;
                })
                .catch(error => {
                    console.error('Error fetching recent pets:', error);
                    this.error = 'Не удалось загрузить объявления';
                    this.loading = false;
                });
        },

        getPetTypeText(pet) {
            if (pet.petType === 'other' && pet.otherPetType) {
                return pet.otherPetType;
            }

            const petTypes = {
                'cat': this.$t('recent.cat') || 'Кошка',
                'dog': this.$t('recent.dog') || 'Собака',
                'bird': this.$t('recent.bird') || 'Птица',
                'other': this.$t('recent.other') || 'Другое животное'
            };


            return petTypes[pet.petType] || 'Животное';
        },

        formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString(this.$i18n.locale || 'ru-RU', options);
        },

        viewDetails(petId) {
            // Navigate to pet details page
            this.$router.push({ name: 'pet-details', params: { id: petId } });
            // If you're not using Vue Router, you can use window.location instead:
            // window.location.href = `/pets/${petId}`;
        }
    }
}
</script>


<style scoped>

@keyframes fade-in {
    from {
        opacity: 0;
        backdrop-filter: blur(0px);
    }
    to {
        opacity: 1;
        backdrop-filter: blur(4px);
    }
}
.animate-fade-in {
    animation: fade-in 0.4s ease-in-out forwards;
}

@keyframes slide-up {
    from {
        opacity: 0;
        transform: translateY(30px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}
.animate-slide-up {
    animation: slide-up 0.5s ease-out forwards;
}
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes zoomIn {
    0% {
        opacity: 0;
        transform: scale(0.85);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes bounceSlow {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

.animate-fadeIn {
    animation: fadeIn 0.4s ease-out forwards;
}

.animate-zoomIn {
    animation: zoomIn 0.35s ease-out forwards;
}

.animate-bounce-slow {
    animation: bounceSlow 1.8s infinite;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes zoomIn {
    0% {
        opacity: 0;
        transform: scale(0.9);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes cardAppear {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeIn {
    animation: fadeIn 0.4s ease-out forwards;
}

.animate-zoomIn {
    animation: zoomIn 0.35s ease-out forwards;
}

.animate-cardAppear {
    animation: cardAppear 0.4s ease-out forwards;
}

.animate-bounce-slow {
    animation: bounceSlow 1.8s infinite;
}


</style>
