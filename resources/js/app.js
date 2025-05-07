import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import i18n from './i18n';



// Создаем экземпляр приложения Vue
const app = createApp(App)

// Подключаем роутер и i18n к приложению
app.use(router)
app.use(i18n)

// Монтируем приложение к DOM
app.mount('#app')

// createApp(App).use(router,i18n).mount('#app');

