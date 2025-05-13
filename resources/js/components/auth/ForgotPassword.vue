<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full px-6 py-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-center text-3xl font-extrabold text-gray-900">
                Восстановление пароля
            </h2>
            <div v-if="status" class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ status }}
            </div>
            <div v-if="errorMessage" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ errorMessage }}
            </div>
            <form @submit.prevent="forgotPassword">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    />
                </div>
                <div class="mb-6">
                    <p class="text-sm text-gray-600">
                        Введите ваш email, и мы отправим вам ссылку для сброса пароля.
                    </p>
                </div>
                <div>
                    <button
                        type="submit"
                        :disabled="loading"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        <span v-if="loading">Отправка...</span>
                        <span v-else>Отправить ссылку</span>
                    </button>
                </div>
                <div class="mt-4 text-center">
                    <router-link to="/login" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Вернуться на страницу входа
                    </router-link>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            form: {
                email: '',
            },
            loading: false,
            status: '',
            errorMessage: '',
        };
    },
    methods: {
        async forgotPassword() {
            this.loading = true;
            this.status = '';
            this.errorMessage = '';

            try {
                // Запрос к API для отправки ссылки на восстановление пароля
                const response = await axios.post('/api/forgot-password', this.form);
                this.status = response.data.message || 'Ссылка для сброса пароля отправлена на ваш email';
                this.form.email = ''; // Очищаем поле после успешной отправки
            } catch (error) {
                if (error.response && error.response.data && error.response.data.message) {
                    this.errorMessage = error.response.data.message;
                } else {
                    this.errorMessage = 'Произошла ошибка при отправке ссылки';
                }
            } finally {
                this.loading = false;
            }
        },
    },
};
</script>
