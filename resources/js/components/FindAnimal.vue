<template>
    <div class="min-h-screen bg-blue-100">
        <!-- Header -->
        <header class="container mx-auto py-8 px-4">
            <h1 class="text-4xl font-bold text-center">Нашли животное?</h1>
            <h2 class="text-2xl text-center mt-4">Мы поможем найти ему дом!</h2>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto py-6 px-4">
            <!-- Info Section -->
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6 mb-8">
                <p class="text-lg text-center mb-6">
                    Если вы нашли бездомное животное, вы можете разместить объявление на нашем сайте.
                    Мы поможем найти новых хозяев или воссоединить питомца с прежними владельцами.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h3 class="text-xl font-semibold mb-3">Как это работает:</h3>
                        <ol class="list-decimal pl-5 space-y-2">
                            <li>Добавьте информацию о найденном животном</li>
                            <li>Загрузите фотографию питомца</li>
                            <li>Укажите контактные данные</li>
                            <li>Мы опубликуем ваше объявление</li>
                        </ol>
                    </div>

                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h3 class="text-xl font-semibold mb-3">Что важно указать:</h3>
                        <ul class="list-disc pl-5 space-y-2">
                            <li>Вид и породу животного (если известно)</li>
                            <li>Пол и примерный возраст</li>
                            <li>Особые приметы</li>
                            <li>Место и дату находки</li>
                            <li>Состояние здоровья</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Recent Ads Section -->
            <div class="max-w-3xl mx-auto mb-10">
                <h3 class="text-2xl font-semibold text-center mb-6">Недавние объявления</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div v-for="(pet, index) in recentPets" :key="index" class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            <img
                                :src="pet.image"
                                :alt="pet.type"
                                class="h-full w-full object-cover"
                            />
                        </div>
                        <div class="p-4">
                            <h4 class="text-lg font-medium">{{ pet.type }}</h4>
                            <p class="text-sm text-gray-600">{{ pet.location }}</p>
                            <p class="text-sm text-gray-600">{{ pet.date }}</p>
                            <button
                                class="mt-2 w-full px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors"
                                @click="viewDetails(pet.id)"
                            >
                                Подробнее
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Button -->
            <div class="text-center">
                <button
                    @click="showAddForm = true"
                    class="inline-block px-6 py-3 bg-blue-600 text-white font-medium text-lg rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors shadow-md"
                >
                    Добавить объявление
                </button>
            </div>
        </main>

        <!-- Add Form Modal -->
        <div v-if="showAddForm" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
            <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-screen overflow-y-auto">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-semibold">Добавить объявление</h3>
                        <button
                            @click="showAddForm = false"
                            class="text-gray-500 hover:text-gray-700"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form @submit.prevent="submitForm" class="space-y-4">
                        <!-- Pet Info -->
                        <div>
                            <label for="petType" class="block text-sm font-medium text-gray-700 mb-1">Вид животного*</label>
                            <select
                                id="petType"
                                v-model="form.petType"
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

                        <div v-if="form.petType === 'other'">
                            <label for="otherPetType" class="block text-sm font-medium text-gray-700 mb-1">Укажите вид животного*</label>
                            <input
                                type="text"
                                id="otherPetType"
                                v-model="form.otherPetType"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                required
                            />
                        </div>

                        <div>
                            <label for="breed" class="block text-sm font-medium text-gray-700 mb-1">Порода (если известно)</label>
                            <input
                                type="text"
                                id="breed"
                                v-model="form.breed"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            />
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Пол</label>
                                <select
                                    id="gender"
                                    v-model="form.gender"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                >
                                    <option value="" disabled selected>Выберите пол</option>
                                    <option value="male">Самец</option>
                                    <option value="female">Самка</option>
                                    <option value="unknown">Не определен</option>
                                </select>
                            </div>

                            <div>
                                <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Примерный возраст</label>
                                <input
                                    type="text"
                                    id="age"
                                    v-model="form.age"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Например: 2 года"
                                />
                            </div>
                        </div>

                        <!-- Location Info -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Место находки*</label>
                            <input
                                type="text"
                                id="location"
                                v-model="form.location"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                required
                                placeholder="Город, район, улица"
                            />
                        </div>

                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Дата находки*</label>
                            <input
                                type="date"
                                id="date"
                                v-model="form.date"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                required
                            />
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Описание</label>
                            <textarea
                                id="description"
                                v-model="form.description"
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
                                @change="handleFileUpload"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                accept="image/*"
                            />
                            <div v-if="imagePreview" class="mt-2">
                                <img :src="imagePreview" alt="Preview" class="h-40 object-contain" />
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div>
                            <label for="contactName" class="block text-sm font-medium text-gray-700 mb-1">Ваше имя*</label>
                            <input
                                type="text"
                                id="contactName"
                                v-model="form.contactName"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                required
                            />
                        </div>

                        <div>
                            <label for="contactPhone" class="block text-sm font-medium text-gray-700 mb-1">Телефон*</label>
                            <input
                                type="tel"
                                id="contactPhone"
                                v-model="form.contactPhone"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                required
                            />
                        </div>

                        <div>
                            <label for="contactEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input
                                type="email"
                                id="contactEmail"
                                v-model="form.contactEmail"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            />
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button
                                type="submit"
                                class="w-full px-4 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors"
                                :disabled="submitting"
                            >
                                {{ submitting ? 'Отправка...' : 'Опубликовать объявление' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Success Modal -->
        <div v-if="showSuccess" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full p-6 text-center">
                <div class="mb-4 text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold mb-2">Спасибо!</h3>
                <p class="text-lg mb-6">Ваше объявление успешно опубликовано</p>
                <button
                    @click="closeSuccess"
                    class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors"
                >
                    Закрыть
                </button>
            </div>
        </div>

<!--        &lt;!&ndash; Footer &ndash;&gt;-->
<!--        <footer class="bg-blue-200 mt-12 py-6">-->
<!--            <div class="container mx-auto px-4 text-center">-->
<!--                <p>© {{ new Date().getFullYear() }} Помощь животным. Все права защищены.</p>-->
<!--                <div class="mt-4 flex justify-center space-x-6">-->
<!--                    <a href="#" class="text-blue-700 hover:text-blue-900">О нас</a>-->
<!--                    <a href="#" class="text-blue-700 hover:text-blue-900">Контакты</a>-->
<!--                    <a href="#" class="text-blue-700 hover:text-blue-900">Правила</a>-->
<!--                    <a href="#" class="text-blue-700 hover:text-blue-900">Политика конфиденциальности</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </footer>-->
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
            recentPets: [
                {
                    id: 1,
                    type: 'Кошка (британская)',
                    location: 'Москва, Сокольники',
                    date: '05.04.2025',
                    image: '/storage/app/public/images/dogs.png'
                },
                {
                    id: 2,
                    type: 'Собака (лабрадор)',
                    location: 'Санкт-Петербург, Невский район',
                    date: '03.04.2025',
                    image: '/api/placeholder/300/200'
                },
                {
                    id: 3,
                    type: 'Попугай',
                    location: 'Екатеринбург, центр',
                    date: '01.04.2025',
                    image: '/api/placeholder/300/200'
                }
            ],
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
    methods: {
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.form.photo = file;
                this.imagePreview = URL.createObjectURL(file);
            }
        },
        submitForm() {
            this.submitting = true;

            // Имитация отправки данных на сервер
            setTimeout(() => {
                console.log('Form submitted:', this.form);

                // Сброс формы
                this.submitting = false;
                this.showAddForm = false;
                this.showSuccess = true;

                // Сброс данных формы
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
            }, 1500);
        },
        closeSuccess() {
            this.showSuccess = false;
        },
        viewDetails(petId) {
            // Здесь будет логика просмотра деталей объявления
            console.log('View details for pet ID:', petId);
            // В реальном приложении здесь может быть перенаправление на страницу с деталями
            // this.$router.push(`/pet/${petId}`);
        }
    }
}
</script>
