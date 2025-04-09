import { createRouter, createWebHistory } from 'vue-router';
import EditProduct from '../components/EditProduct.vue';
import CreateProduct from '../components/CreateProduct.vue';
import CreateAnimal from "../components/CreateAnimal.vue";
import Registration from "../components/Registration.vue";
import HomePage from "../components/HomePage.vue";

const routes = [
    {
        path: '/',
        component: HomePage,
    },
    {
        path: '/products/create',
        component: CreateProduct,
    },

    {
        path: '/products/:id/edit',
        component: EditProduct,
    },
    {
        path: '/create-animal',
        component: CreateAnimal,
    },
    {
        path: '/register',
        component: Registration,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
