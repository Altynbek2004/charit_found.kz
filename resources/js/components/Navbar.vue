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
                <a href="https://t.me/"><img src="/storage/app/public/imageMenu/image%2011.png" class="w-10 h-10" alt="Telegram" /></a>
                <a href="https://instagram.com"><img src="/storage/app/public/imageMenu/image%2012.png" class="w-10 h-10" alt="Instagram" /></a>
                <a href="https://wa.me/+77755938808"><img src="/storage/app/public/imageMenu/image%2013.png" class="w-10 h-10" alt="Whatsapp" /></a>
            </div>
        </div>
    </header>

    <nav class="bg-white shadow-sm py-4">
        <div class="container mx-auto max-w-screen-xl flex justify-between items-center px-4">
            <!-- Лого -->
            <div class="flex items-center gap-4">
                <img src="/storage/app/public/imageMenu/logo_chari_found.png" alt="Logo" class="h-16" />
                <span class="text-xl font-semibold whitespace-nowrap">Flowbite</span>
            </div>

            <ul class="hidden md:flex space-x-6 font-bold">
                <li><a href="/" class="hover:underline">Главная</a></li>
                <li><a href="#" class="hover:underline">О нас</a></li>
                <li><a href="#" class="hover:underline">Питомцы</a></li>
                <li><a href="#" class="hover:underline">Чат-помощник</a></li>
            </ul>

            <div class="relative">
                <div class="flex items-center gap-6">
      <span class="text-lg font-bold cursor-pointer" @click="toggleDropdown">
        {{ selectedLanguage }}
      </span>

                    <router-link to="/register" class="text-lg font-bold">Войти</router-link>
                </div>

                <div v-if="showDropdown" class="absolute mt-2 bg-white shadow-lg rounded-md z-50 w-24">
                    <ul>
                        <li v-for="lang in languages" :key="lang" @click.stop="selectLanguage(lang)"
                            class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                            {{ lang }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    </body>

</template>

<script>
    export default
    {
        name: 'Navbar',

        data() {
            return {
                showDropdown: false,
                selectedLanguage: 'RU',
                languages: ['RU', 'ENG', 'KAZ'],
            };
        },
        methods: {
            toggleDropdown() {
                this.showDropdown = !this.showDropdown;
            },
            selectLanguage(lang) {
                this.selectedLanguage = lang;
                this.showDropdown = false;
            },
        },


    }
</script>

<style scoped>
</style>
