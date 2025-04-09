<template>
    <body class="font-sans">
    <header class="flex justify-between items-center p-4 bg-blue-100 w-[1590px] mx-auto">
        <!-- Сол жақ бөлік -->
        <div class="flex items-center gap-4 text-sm font-bold">
            <span>+7 775 593 88 08</span>
            <span>email</span>
        </div>

        <!-- Оң жақ бөлік -->
        <div class="flex gap-2 ml-auto">
            <img src="/storage/app/public/imageMenu/image%2011.png" class="w-10 h-10" alt="Instagram" />
            <img src="/storage/app/public/imageMenu/image%2012.png" class="w-10 h-10" alt="WhatsApp" />
            <img src="/storage/app/public/imageMenu/image%2013.png" class="w-10 h-10" alt="Telegram" />
        </div>
    </header>





    <!-- Navigation -->
    <nav class="flex justify-between items-center bg-white shadow-sm p-4">
        <!-- Сол жақтағы логотип -->
        <div class="flex items-center gap-4 ml-40">
            <img src="/storage/app/public/imageMenu/logo_chari_found.png" alt="Logo" class="h-20" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </div>

        <!-- Орталық навигация -->
        <ul class="flex space-x-4 font-bold">
            <li><a href="#" class="hover:underline">Главная</a></li>
            <li class="border-b-4 border-blue-400 pb-1">О нас</li>
            <li><a href="#" class="hover:underline">Питомцы</a></li>
            <li><a href="#" class="hover:underline">Чат-помощник</a></li>
        </ul>

        <!-- Оң жақтағы сілтемелер -->
        <div class="flex items-center gap-10  mr-44">
            <span class="text-lg font-bold">RU</span>
            <span class="text-lg font-bold">Войти</span>
        </div>
    </nav>

    <!-- Hero section -->
    <section class="flex justify-center bg-blue-200 p-6">
        <img src="/storage/app/public/imageMenu/dog.png" alt="Pets" class="rounded-lg shadow-lg" />
    </section>

    <div class="text-center text-4xl font-bold mt-6 mb-4"><h1>Добавить объявление</h1></div>
        <div class="w-[1590px] mx-auto bg-blue-100 p-6 rounded-lg shadow-lg flex justify-center items-center">
            <div class="w-full">
                <h2 class="text-center text-2xl font-bold mb-4">Форма</h2>
                <form class="w-96 mx-auto">
                    <div class="mb-4">
                        <label for="input1" class="block text-gray-700">Инпут 1</label>
                        <input type="text" id="input1" class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="mb-4">
                        <label for="input2" class="block text-gray-700">Инпут 2</label>
                        <input type="text" id="input2" class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="mb-4">
                        <label for="input3" class="block text-gray-700">Инпут 3</label>
                        <input type="text" id="input3" class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="mb-4">
                        <label for="input4" class="block text-gray-700">Инпут 4</label>
                        <input type="text" id="input4" class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="mb-4">
                        <label for="input5" class="block text-gray-700">Инпут 5</label>
                        <input type="text" id="input5" class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Жіберу</button>
                </form>
            </div>
        </div>
    </body>
</template>

<script setup>

</script>

<style scoped>

</style>
