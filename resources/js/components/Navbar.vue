<template>
    <body class="font-sans">
    <!-- Header Section -->
    <header class="bg-blue-200 py-4 shadow-md">
        <div class="container mx-auto max-w-screen-xl flex justify-between items-center px-6">
            <div class="flex items-center gap-6 text-sm font-semibold text-blue-900">
                <span>{{ $t('header.contacts') }}</span>
                <span>{{ $t('header.email') }}</span>
            </div>
            <div class="flex gap-4">
                <a href="https://t.me/" class="transition-transform duration-300 hover:scale-110">
                    <img src="/storage/app/public/imageMenu/telegram.png" class="w-8 h-8" alt="Telegram" />
                </a>
                <a href="https://instagram.com" class="transition-transform duration-300 hover:scale-110">
                    <img src="/storage/app/public/imageMenu/instagram.png" class="w-8 h-8" alt="Instagram" />
                </a>
                <a href="https://wa.me/+77755938808" class="transition-transform duration-300 hover:scale-110">
                    <img src="/storage/app/public/imageMenu/whatsapp.png" class="w-8 h-8" alt="Whatsapp" />
                </a>
            </div>
        </div>
    </header>

    <!-- Navigation Section -->
    <nav class="bg-white shadow-lg py-4">
        <div class="container mx-auto max-w-screen-xl flex justify-between items-center px-6">
            <!-- Logo Section -->
            <div class="flex items-center gap-6">
                <img src="/storage/app/public/imageMenu/logo_chari_found.png" alt="Logo" class="h-16 transition-transform duration-300 hover:scale-110" />
                <span class="text-2xl font-semibold text-blue-900">Flowbite</span>
            </div>

            <!-- Navigation Links -->
            <ul class="hidden md:flex space-x-8 font-bold text-lg text-blue-900">
                <li><a href="/#top" class="transition-all duration-300 hover:text-blue-600 hover:underline">{{ $t('nav.home') }}</a></li>
                <li><a href="/#about" class="transition-all duration-300 hover:text-blue-600 hover:underline">{{ $t('nav.about') }}</a></li>
                <li><a href="/#pets" class="transition-all duration-300 hover:text-blue-600 hover:underline">{{ $t('nav.pets') }}</a></li>
                <li><a href="/#assistant" class="transition-all duration-300 hover:text-blue-600 hover:underline">{{ $t('nav.assistant') }}</a></li>
            </ul>

            <!-- Language and Auth -->
            <div class="relative flex items-center gap-6">
          <span class="text-lg font-bold cursor-pointer transition-all duration-300 hover:text-blue-600" @click="toggleDropdown">
            {{ selectedLanguage }}
          </span>

                <!-- Login or User Icon -->
                <div class="relative">
                    <!-- If NOT Authenticated -->
                    <router-link v-if="!isAuthenticated" to="/login" class="text-lg font-bold text-blue-900 hover:text-blue-600 transition-all duration-300">
                        {{ $t('nav.login') }}
                    </router-link>

                    <!-- If Authenticated -->
                    <div v-else class="relative">
                        <img
                            src="/storage/app/public/imageMenu/user.png"
                            class="w-8 h-8 rounded-full cursor-pointer transition-transform duration-300 hover:scale-110"
                            @click="toggleUserMenu"
                            alt="User Icon"
                        />

                        <div v-if="showUserMenu" class="absolute right-0 mt-2 bg-white shadow-lg rounded-md z-50 w-40">
                            <ul>
                                <li @click="goToProfile" class="px-4 py-2 hover:bg-gray-100 cursor-pointer transition-all duration-300">
                                    {{ $t('nav.profile') || 'My Profile' }}
                                </li>
                                <li @click="logout" class="px-4 py-2 hover:bg-gray-100 cursor-pointer transition-all duration-300 text-red-500">
                                    {{ $t('nav.logout') || 'Logout' }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Language Dropdown -->
                <div v-if="showDropdown" class="absolute mt-12 bg-white shadow-lg rounded-md z-50 w-32">
                    <ul>
                        <li
                            v-for="lang in languages"
                            :key="lang.code"
                            @click.stop="selectLanguage(lang.code, lang.display)"
                            class="px-4 py-2 hover:bg-gray-100 cursor-pointer transition-all duration-300"
                        >
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
            showUserMenu: false,
            selectedLanguage: 'Рус',
            languages: [
                { code: 'ru', display: 'Рус' },
                { code: 'en', display: 'Eng' },
                { code: 'kz', display: 'Қаз' }
            ],
        };
    },
    created() {

        const token = localStorage.getItem('token');

        if(token)
        {
            this.isAuthenticated=true;
        }
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
        toggleUserMenu() {
            this.showUserMenu = !this.showUserMenu;
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
        },

        goToProfile() {
            this.$router.push('/profile');
            this.showUserMenu = false;
        },
        logout() {
            const token = localStorage.getItem('token');
            // Отправляем запрос на сервер для выхода
            axios.post('/api/logout', {}, {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            }).then(() => {
                // Успешный выход
                localStorage.removeItem('token');     // удаляем токен
                this.isAuthenticated = false;         // обновляем состояние
                this.showUserMenu = false;            // скрываем меню
                window.location.href = `/`;             // редирект на главную
            }).catch(error => {
                console.error('Logout error:', error);
                // даже если ошибка — всё равно удалим токен
                localStorage.removeItem('token');
                this.isAuthenticated = false;
                window.location.href = `/`;
            });
        }

    },
    computed: {
        isAuthenticated() {
            return !!localStorage.getItem('token');
        }
    }


}
</script>

<style scoped>
</style>
