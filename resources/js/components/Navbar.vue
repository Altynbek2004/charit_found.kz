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
            <li><a href="#" class="hover:underline">О нас</a></li>
            <li><a href="#" class="hover:underline">Питомцы</a></li>
            <li><a href="#" class="hover:underline">Чат-помощник</a></li>
        </ul>

        <!-- Оң жақтағы сілтемелер -->
        <div class="flex items-center gap-10  mr-44">
            <span class="text-lg font-bold">RU</span>
            <span class="text-lg font-bold">Войти</span>
        </div>
    </nav>
    </body>

</template>

<script>
    export default
    {
        name: 'Navbar',
    }
</script>

<style scoped>
</style>
