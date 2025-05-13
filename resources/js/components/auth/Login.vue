<template>
  <div class="min-h-screen flex items-center justify-center bg-sky-100 transition-all">
    <div
        class="max-w-md w-full px-8 py-10 bg-white rounded-2xl shadow-xl border border-sky-300 hover:shadow-2xl transition-all duration-500"
    >
      <h2 class="mb-6 text-center text-3xl font-extrabold text-sky-600 tracking-wide">
        Вход в систему
      </h2>

      <div
          v-if="errorMessage"
          class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-sm"
      >
        {{ errorMessage }}
      </div>

      <form @submit.prevent="login">
        <div class="mb-5">
          <label for="email" class="block text-sm font-semibold text-sky-700 mb-1">Email</label>
          <input
              id="email"
              v-model="form.email"
              type="email"
              required
              class="w-full border border-sky-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition duration-300 hover:ring-1 hover:ring-sky-300"
          />
        </div>

        <div class="mb-6">
          <label for="password" class="block text-sm font-semibold text-sky-700 mb-1">Пароль</label>
          <input
              id="password"
              v-model="form.password"
              type="password"
              required
              class="w-full border border-sky-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition duration-300 hover:ring-1 hover:ring-sky-300"
          />
        </div>

        <div class="flex items-center justify-between mb-6">
          <div class="flex items-center">
            <input
                id="remember_me"
                v-model="form.remember"
                type="checkbox"
                class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-sky-300 rounded transition-transform duration-200 transform hover:scale-110"
            />
            <label for="remember_me" class="ml-2 text-sm text-sky-700 font-medium">Запомнить меня</label>
          </div>
          <div class="text-sm">
            <router-link
                to="/forgot-password"
                class="font-semibold text-sky-600 hover:text-sky-800 transition-colors duration-300"
            >
              Забыли пароль?
            </router-link>
          </div>
        </div>

        <div>
          <button
              type="submit"
              :disabled="loading"
              class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-md text-sm font-semibold text-white bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-400 transition duration-300 transform hover:-translate-y-0.5 hover:shadow-lg"
          >
            <span v-if="loading">Загрузка...</span>
            <span v-else>Войти</span>
          </button>
        </div>

        <!-- Регистрация -->
        <div class="mt-6 text-center">
          <p class="text-sm text-sky-700">
            Нет аккаунта?
            <router-link
                to="/register"
                class="font-semibold text-sky-600 hover:text-sky-800 transition-colors duration-300 hover:underline"
            >
              Регистрация
            </router-link>
          </p>
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
                password: '',
                remember: false,
            },
            loading: false,
            errorMessage: '',
        };
    },
    methods: {
        async login() {
            this.loading = true;
            this.errorMessage = '';

            try {
                // Запрос к API для логина
                const response = await axios.post('/api/login', this.form);

                // Сохраняем токен авторизации, если он есть
                if (response.data.token) {
                  localStorage.setItem('token', response.data.token); // сохраняем токен
                    // axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`;
                }

                // Перенаправляем на домашнюю страницу или личный кабинет
                 this.$router.push('/');
            } catch (error) {
                if (error.response && error.response.data && error.response.data.message) {
                    this.errorMessage = error.response.data.message;
                } else {
                    this.errorMessage = 'Произошла ошибка при входе в систему';
                }
            } finally {
                this.loading = false;
            }
        },
    },
};
</script>
