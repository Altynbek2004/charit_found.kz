<template>
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="container mx-auto py-4 px-6">
                <h1 class="text-3xl font-bold text-center">Связаться с нами</h1>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto py-8 px-6">
            <div class="max-w-[1150px] mx-auto bg-white rounded-lg shadow-md p-8">
                <!-- Contact Form -->
                <form @submit.prevent="submitForm" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Имя</label>
                            <input
                                type="text"
                                id="name"
                                v-model="form.name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required
                            />
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input
                                type="email"
                                id="email"
                                v-model="form.email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required
                            />
                        </div>
                    </div>

                    <div class="">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Телефон</label>
                        <input
                            type="tel"
                            id="phone"
                            v-model="form.phone"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        />
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Тема</label>
                        <select
                            id="subject"
                            v-model="form.subject"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                            <option value="" disabled selected>Выберите тему</option>
                            <option value="general">Общий вопрос</option>
                            <option value="support">Техническая поддержка</option>
                            <option value="billing">Вопрос оплаты</option>
                            <option value="other">Другое</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Сообщение</label>
                        <textarea
                            id="message"
                            v-model="form.message"
                            rows="5"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        ></textarea>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="w-full md:w-auto px-6 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors"
                            :disabled="submitting"
                        >
                            {{ submitting ? 'Отправка...' : 'Отправить сообщение' }}
                        </button>
                    </div>
                </form>

                <!-- Success Message -->
                <div v-if="submitted" class="mt-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
                    <p class="font-medium">Спасибо за обращение!</p>
                    <p>Мы получили ваше сообщение и ответим вам в ближайшее время.</p>
                </div>
            </div>

            <!-- Contact Information -->

            <div class="max-w-6xl mx-auto mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-blue-100 text-blue-500 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium mb-2">Телефон</h3>
                    <p>+7 (775) 775-75-75</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-blue-100 text-blue-500 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium mb-2">Email</h3>
                    <p>animals@company.ru</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-blue-100 text-blue-500 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium mb-2">Адрес</h3>
                    <p>г. Алматы, ул. Абая, д. 123</p>
                </div>
            </div>




        </main>

    </div>
</template>

<script>
import Footer from './Footer.vue';
export default {
    name: 'ContactUs',
    components: {
        Footer
    },
    data() {
        return {
            form: {
                name: '',
                email: '',
                phone: '',
                subject: '',
                message: ''
            },
            submitting: false,
            submitted: false
        }
    },
    methods: {
        submitForm() {
            this.submitting = true;

            // Имитация отправки данных на сервер
            setTimeout(() => {
                // Здесь можно добавить код для отправки данных на сервер
                console.log('Form submitted:', this.form);

                // Сброс формы и установка флага успешной отправки
                this.submitting = false;
                this.submitted = true;

                // Сброс формы
                this.form = {
                    name: '',
                    email: '',
                    phone: '',
                    subject: '',
                    message: ''
                };

                // Сброс флага успешной отправки через некоторое время
                setTimeout(() => {
                    this.submitted = false;
                }, 5000);
            }, 1500);
        }
    }
}
</script>
