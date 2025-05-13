<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full px-6 py-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-center text-3xl font-extrabold text-gray-900">
                Сброс пароля
            </h2>
            <div v-if="status" class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ status }}
            </div>
            <div v-if="errorMessage" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ errorMessage }}
            </div>
            <form @submit.prevent="resetPassword">
                <input type="hidden" v-model="form.token">
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
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Новый пароль</label>
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    />
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Подтверждение пароля</label>
                    <input
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    />
                </div>
                <div>
                    <button
                        type="submit"
                        :disabled="loading"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        <span v-if="loading">Обработка...</span>
                        <span v-else>Сбросить пароль</span>
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
                token: '',
                email: '',
                password: '',
                password_confirmation: '',
            },
            loading: false,
            status: '',
            errorMessage: '',
        };
    },
    created() {
        // Получаем токен и email из URL
        this.form.token = this.$route.params.token || this.$route.query.token;
        this.form.email = this.$route.query.email || '';
    },
    methods: {
        async resetPassword() {
            this.loading = true;
            this.status = '';
            this.errorMessage = '';

            try {
                // Проверка совпадения паролей
                if (this.form.password !== this.form.password_confirmation) {
                    this.errorMessage = 'Пароли не совпадают';
                    this.loading = false;
                    return;
                }

                // Запрос к API для сброса пароля
                const response = await axios.post('/api/reset-password', this.form);
                this.status = response.data.message || 'Пароль успешно сброшен';

                // Перенаправляем на страницу входа через 3 секунды
                setTimeout(() => {
                    this.$router.push('/login');
                }, 3000);
            } catch (error) {
                if (error.response && error.response.data && error.response.data.message) {
                    this.errorMessage = error.response.data.message;
                } else if (error.response && error.response.data && error.response.data.errors) {
                    // Обработка ошибок валидации
                    const errors = Object.values(error.response.data.errors).flat();
                    this.errorMessage = errors.join(', ');
                } else {
                    this.errorMessage = 'Произошла ошибка при сбросе пароля';
                }
            } finally {
                this.loading = false;
            }
        },
    },
};
</script>
