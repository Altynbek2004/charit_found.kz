// src/i18n/index.js
import { createI18n } from 'vue-i18n';

import ru from './locales/ru.js';
import en from './locales/en.js';
import kz from './locales/kz.js';

const i18n = createI18n({
    legacy: false, // используем Composition API
    locale: localStorage.getItem('appLanguage') || 'ru', // язык по умолчанию
    fallbackLocale: 'ru', // запасной язык
    messages: {
        ru,
        en,
        kz
    }
});

export default i18n;
