<template>
    <body class="font-sans">

    <!-- Header -->
    <header class="bg-blue-100 py-4">
        <div class="container mx-auto max-w-screen-xl flex justify-between items-center px-4">
            <!-- Сол жақ -->
            <div class="flex items-center gap-4 text-sm font-bold">
                <span>{{ $t('header.contacts') }}</span>
                <span>{{ $t('header.email') }}</span>
            </div>

            <!-- Оң жақ -->
            <div class="flex gap-2">
                <a href="https://t.me/"><img src="/storage/app/public/imageMenu/telegram.png" class="w-8 h-8" alt="Telegram" /></a>
                <a href="https://instagram.com"><img src="/storage/app/public/imageMenu/instagram.png" class="w-8 h-8" alt="Instagram" /></a>
                <a href="https://wa.me/+77755938808"><img src="/storage/app/public/imageMenu/whatsapp.png" class="w-8 h-8" alt="Whatsapp" /></a>
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
                <li><a href="#top" @click.prevent="scrollToSection('top')" class="hover:underline">{{ $t('nav.home') }}</a></li>
                <li><a href="#about" @click.prevent="scrollToSection('about')" class="hover:underline">{{ $t('nav.about') }}</a></li>
                <li><a href="#pets" @click.prevent="scrollToSection('pets')" class="hover:underline">{{ $t('nav.pets') }}</a></li>
                <li><a href="#assistant" @click.prevent="scrollToSection('assistant')" class="hover:underline">{{ $t('nav.assistant') }}</a></li>
            </ul>

            <div class="relative">
                <div class="flex items-center gap-6">
                    <span class="text-lg font-bold cursor-pointer" @click="toggleDropdown">
                        {{ selectedLanguage }}
                    </span>

                    <router-link to="/register" class="text-lg font-bold">{{ $t('nav.login') }}</router-link>
                </div>

                <div v-if="showDropdown" class="absolute mt-2 bg-white shadow-lg rounded-md z-50 w-24">
                    <ul>
                        <li v-for="lang in languages" :key="lang.code" @click.stop="selectLanguage(lang.code, lang.display)"
                            class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                            {{ lang.display }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    </body>

</template>

<script>
import { useI18n } from 'vue-i18n';

export default {
    name: 'Navbar',
    setup() {
        const { locale } = useI18n();
        return { locale };
    },
    data() {
        return {
            showDropdown: false,
            selectedLanguage: 'Рус',
            languages: [
                { code: 'ru', display: 'Рус' },
                { code: 'en', display: 'ENG' },
                { code: 'kz', display: 'Қаз' }
            ],
        };
    },
    created() {
        // Установка начального языка из localStorage или дефолтного значения
        const savedLanguage = localStorage.getItem('appLanguage');
        if (savedLanguage) {
            this.locale = savedLanguage;
            // Обновляем отображаемый язык в меню
            const langObj = this.languages.find(l => l.code === savedLanguage);
            if (langObj) {
                this.selectedLanguage = langObj.display;
            }
        }
    },
    methods: {
        toggleDropdown() {
            this.showDropdown = !this.showDropdown;
        },
        selectLanguage(langCode, langDisplay) {
            this.selectedLanguage = langDisplay;
            this.locale = langCode;
            localStorage.setItem('appLanguage', langCode);
            this.showDropdown = false;
        },
        scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            if (element) {
                // Use smooth scrolling behavior
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            } else if (sectionId === 'top') {
                // Scroll to the top of the page
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
            // Close dropdown if open
            this.showDropdown = false;
        }
    },
    // mounted() {
    //     // Close dropdown when clicking outside
    //     document.addEventListener('click', () => {
    //         this.showDropdown = false;
    //     });
    // },
    // beforeUnmount() {
    //     document.removeEventListener('click', () => {
    //         this.showDropdown = false;
    //     });
    // }
}
</script>

<style scoped>
</style>
