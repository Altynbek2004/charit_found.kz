import { createRouter, createWebHistory } from 'vue-router';
import Registration from "../components/Registration.vue";
import HomePage from "../components/HomePage.vue";
import AdoptAnimal from '../components/AdoptAnimal.vue';
import PetDetailsPage from '../components/PetDetailsPage.vue';
import AdoptPetDetailsPage from '../components/AdoptPetDetailsPage.vue';
import Navbar from "../components/Navbar.vue";
import Login from "../components/auth/Login.vue";
import ForgotPassword from "../components/auth/ForgotPassword.vue";
import ResetPassword from "../components/auth/ResetPassword.vue";

const routes = [
    {
        path: '/',
        component: HomePage,
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: { guest: true }
    },
    {
        path: '/forgot-password',
        name: 'forgot-password',
        component: ForgotPassword,
        meta: { guest: true }
    },
    {
        path: '/reset-password/:token',
        name: 'reset-password',
        component: ResetPassword,
        meta: { guest: true }
    },
    {
        path: '/adopt-animal',
        component: AdoptAnimal,
    },
    {
        path: '/pets/:id',
        name: 'pet-details',
        component: PetDetailsPage,
        props: true
    },
    {
        path: '/adopt-pets/:id',
        name: 'adopt-pet-details',
        component: AdoptPetDetailsPage,
        props: true
    },
    {
        path: '/register',
        component: Registration,
    },
    {
        path: '/navbar',
        component: Navbar,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (to.hash) {
            return {
                el: to.hash,
                behavior: 'smooth', // Плавная прокрутка
            }
        }
        return { top: 0, behavior: 'smooth' } // Плавно к верху
    }
})



// Навигационный guard для защиты маршрутов
// router.beforeEach((to, from, next) => {
//     const isAuthenticated = !!localStorage.getItem('auth_token');
//
//     if (to.matched.some(record => record.meta.requiresAuth)) {
//         // Проверяем, авторизован ли пользователь
//         if (!isAuthenticated) {
//             next('/login');
//         } else {
//             next();
//         }
//     } else if (to.matched.some(record => record.meta.guest)) {
//         // Если пользователь уже авторизован, перенаправляем на дашборд
//         if (isAuthenticated) {
//             next('/dashboard');
//         } else {
//             next();
//         }
//     } else {
//         next();
//     }
// });

export default router;
