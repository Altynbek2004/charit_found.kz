<template>
    <div class="max-w-5xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-6">Приютить животное</h1>

        <div
            @click="showAddFormAdopt = true"
            class="flex justify-end mb-4">
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

    <div v-if="showAddFormAdopt" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-screen overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-semibold">Добавить объявление</h3>
                    <button
                        @click="showAddFormAdopt = false"
                        class="text-gray-500 hover:text-gray-700"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form @submit.prevent="submitFormAdopt" class="space-y-4">
                    <!-- Pet Info -->
                    <div>
                        <label for="petType" class="block text-sm font-medium text-gray-700 mb-1">Вид животного*</label>
                        <select
                            id="petType"
                            v-model="formAdopt.petType"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                            <option value="" disabled selected>Выберите вид животного</option>
                            <option value="cat">Кошка</option>
                            <option value="dog">Собака</option>
                            <option value="bird">Птица</option>
                            <option value="other">Другое</option>
                        </select>
                    </div>

                    <div v-if="formAdopt.petType === 'other'">
                        <label for="otherPetType" class="block text-sm font-medium text-gray-700 mb-1">Укажите вид животного*</label>
                        <input
                            type="text"
                            id="otherPetType"
                            v-model="formAdopt.otherPetType"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            required
                        />
                    </div>

                    <div>
                        <label for="breed" class="block text-sm font-medium text-gray-700 mb-1">Порода</label>
                        <input
                            type="text"
                            id="breed"
                            v-model="formAdopt.breed"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        />
                    </div>
                    <div>
                        <label for="breed" class="block text-sm font-medium text-gray-700 mb-1">Имя животного</label>
                        <input
                            type="text"
                            id="breed"
                            v-model="formAdopt.namePet"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Пол</label>
                            <select
                                id="gender"
                                v-model="formAdopt.gender"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            >
                                <option value="" disabled selected>Выберите пол</option>
                                <option value="male">Самец</option>
                                <option value="female">Самка</option>
                            </select>
                        </div>

                        <div>
                            <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Возраст</label>
                            <input
                                type="text"
                                id="age"
                                v-model="formAdopt.age"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Например: 2 года"
                            />
                        </div>
                    </div>

                    <!-- Location Info -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Место нахождения*</label>
                        <input
                            type="text"
                            id="location"
                            v-model="formAdopt.location"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            required
                            placeholder="Город, район, улица"
                        />
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Описание</label>
                        <textarea
                            id="description"
                            v-model="formAdopt.description"
                            rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Особые приметы, состояние здоровья, поведение и т.д."
                        ></textarea>
                    </div>

                    <!-- Photo Upload -->
                    <div>
                        <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Фотография животного</label>
                        <input
                            type="file"
                            id="photo"
                            ref="fileInput"
                            @change="handleFileUploadAdopt"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            accept="image/*"
                        />
                        <div v-if="imagePreviewAdopt" class="mt-2">
                            <img :src="imagePreviewAdopt" alt="Preview" class="h-40 object-contain" />
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <label for="contactName" class="block text-sm font-medium text-gray-700 mb-1">Ваше имя*</label>
                        <input
                            type="text"
                            id="contactName"
                            v-model="formAdopt.contactName"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            required
                        />
                    </div>

                    <div>
                        <label for="contactPhone" class="block text-sm font-medium text-gray-700 mb-1">Телефон*</label>
                        <input
                            type="tel"
                            id="contactPhone"
                            v-model="formAdopt.contactPhone"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            required
                        />
                    </div>

                    <div>
                        <label for="contactEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input
                            type="email"
                            id="contactEmail"
                            v-model="formAdopt.contactEmail"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        />
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button
                            type="submit"
                            class="w-full px-4 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors"
                            :disabled="submittingAdopt"
                        >
                            {{ submittingAdopt ? 'Отправка...' : 'Опубликовать объявление' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div v-if="showSuccessAdopt" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full p-6 text-center">
            <div class="mb-4 text-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h3 class="text-2xl font-semibold mb-2">Спасибо!</h3>
            <p class="text-lg mb-6">Ваше объявление успешно опубликовано</p>
            <button
                @click="closeSuccessAdopt"
                class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors"
            >
                Закрыть
            </button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
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
            tabs: ['Собаки', 'Кошки', 'Другие', 'Временно'],
            activeTab: 'Собаки'
        }
    },
    methods: {
        submitFormAdopt() {
            console.log(22222);
            this.submittingAdopt = true;

            // Create FormData for file upload
            const formData = new FormData();
            formData.append('petType', this.formAdopt.petType);
            formData.append('otherPetType', this.formAdopt.otherPetType);
            formData.append('breed', this.formAdopt.breed);
            formData.append('gender', this.formAdopt.gender);
            formData.append('age', this.formAdopt.age);
            formData.append('location', this.formAdopt.location);
            formData.append('date', this.formAdopt.date);
            formData.append('description', this.formAdopt.description);

            if (this.formAdopt.photo) {
                formData.append('photo', this.formAdopt.photo);
            }

            formData.append('contactName', this.formAdopt.contactName);
            formData.append('contactPhone', this.formAdopt.contactPhone);
            formData.append('contactEmail', this.formAdopt.contactEmail);

            // Send data to Laravel backend
            axios.post('/api/adopt-pets', formData, {
                headers: {
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
                        // You can handle validation errors here
                        this.errors = error.response.data.errors;
                    } else {
                        // Handle other errors
                        alert('Произошла ошибка при отправке формы. Пожалуйста, попробуйте позже.');
                    }
                });
        },

// Add this method to handle file upload
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
                    this.recentPets = response.data.data;
                    this.loading = false;
                })
                .catch(error => {
                    console.error('Error fetching recent pets:', error);
                    this.error = 'Не удалось загрузить объявления';
                    this.loading = false;
                });
        },

        getPetTypeTextAdopt(pet) {
            if (pet.petType === 'other' && pet.otherPetType) {
                return pet.otherPetType;
            }

            const petTypes = {
                'cat': 'Кошка',
                'dog': 'Собака',
                'bird': 'Птица',
                'other': 'Другое животное'
            };

            return petTypes[pet.petType] || 'Животное';
        },

        formatDateAdopt(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('ru-RU', options);
        },

        viewDetailsAdopt(petId) {
            // Navigate to pet details page
            this.$router.push({ name: 'pet-details', params: { id: petId } });
            // If you're not using Vue Router, you can use window.location instead:
            // window.location.href = `/pets/${petId}`;
        }
    },
};
</script>

<style scoped>

</style>
