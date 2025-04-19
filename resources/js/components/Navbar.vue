<template>
    <body class="font-sans">

    <!-- Header -->
    <header class="bg-blue-100 py-4">
        <div class="container mx-auto max-w-screen-xl flex justify-between items-center px-4">
            <!-- Сол жақ -->
            <div class="flex items-center gap-4 text-sm font-bold">
                <span>+7 775 593 88 08</span>
                <span>email</span>
            </div>

            <!-- Оң жақ -->
            <div class="flex gap-2">
                <img src="/storage/app/public/imageMenu/image%2011.png" class="w-10 h-10" alt="Instagram" />
                <img src="/storage/app/public/imageMenu/image%2012.png" class="w-10 h-10" alt="WhatsApp" />
                <img src="/storage/app/public/imageMenu/image%2013.png" class="w-10 h-10" alt="Telegram" />
            </div>
        </div>
    </header>

    <!-- Навигация -->
    <nav class="bg-white shadow-sm py-4">
        <div class="container mx-auto max-w-screen-xl flex justify-between items-center px-4">
            <!-- Лого -->
            <div class="flex items-center gap-4">
                <img src="/storage/app/public/imageMenu/logo_chari_found.png" alt="Logo" class="h-16" />
                <span class="text-xl font-semibold whitespace-nowrap">Flowbite</span>
            </div>

            <!-- Навигация -->
            <ul class="hidden md:flex space-x-6 font-bold">
                <li><a href="/" class="hover:underline">Главная</a></li>
                <li><a href="#" class="hover:underline">О нас</a></li>
                <li><a href="#" class="hover:underline">Питомцы</a></li>
                <li><a href="#" class="hover:underline">Чат-помощник</a></li>
            </ul>

            <!-- Язык және Войти -->
            <div class="flex items-center gap-6">
                <span class="text-lg font-bold">RU</span>
                <a href="/register"><span class="text-lg font-bold">Войти</span></a>
            </div>
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
