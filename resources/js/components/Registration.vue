<template>

    <Navbar></Navbar>
    <!-- Hero section -->
    <section class="flex flex-col items-center bg-blue-200 p-6 h-170">
<<<<<<< Updated upstream
        <!-- Форма блокы -->
        <div class="w-[1590px] bg-blue-100 p-6 rounded-lg shadow-lg">
            <!-- Форма тақырыбы -->
            <h2 class="text-center text-2xl font-bold mb-4">Регистрация</h2>
            <!-- Форма: орталыққа бағытталған, ені 384px (w-96) -->
            <form class="w-96 mx-auto">
                <div class="mb-4">
                    <label for="input1" class="block text-gray-700">Инпут 1</label>
                    <input
                        type="text"
                        id="input1"
                        class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div class="mb-4">
                    <label for="input2" class="block text-gray-700">Инпут 2</label>
                    <input
                        type="text"
                        id="input2"
                        class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div class="mb-4">
                    <label for="input3" class="block text-gray-700">Инпут 3</label>
                    <input
                        type="text"
                        id="input3"
                        class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div class="mb-4">
                    <label for="input4" class="block text-gray-700">Инпут 4</label>
                    <input
                        type="text"
                        id="input4"
                        class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div class="mb-4">
                    <label for="input5" class="block text-gray-700">Инпут 5</label>
                    <input
                        type="file"
                        id="input5"
                        class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Зарегистрироваться
                </button>
            </form>
=======
        <!-- Внешний контейнер для фона и формы -->
        <div class="container mx-auto max-w-screen-xl px-4 flex justify-between items-center">
            <!-- Форма блоки -->
            <div class="w-[1590px] bg-blue-100 p-6 rounded-lg shadow-lg">
                <!-- Форма тақырыбы -->
                <h2 class="text-center text-2xl font-bold mb-4">Регистрация</h2>
                <!-- Форма: орталыққа бағытталған, ені 384px (w-96) -->
                <form class="w-96 mx-auto" method="POST">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Имя</label>
                        <input
                            type="text"
                            id="input1"
                            class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="surname" class="block text-gray-700">Фамилия</label>
                        <input
                            type="text"
                            id="input2"
                            class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Электронные почта</label>
                        <input
                            type="email"
                            id="input3"
                            class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Пароль</label>
                        <input
                            type="text"
                            id="input4"
                            class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="avatar" class="block text-gray-700">Аватар</label>
                        <input
                            type="file"
                            id="input5"
                            class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>
                    <button
                        type="submit"
                        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        Зарегистрироваться
                    </button>
                </form>
            </div>
>>>>>>> Stashed changes
        </div>
    </section>
</template>

<script setup>

import Navbar from "./Navbar.vue";
</script>

<style scoped>

</style>
