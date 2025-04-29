import { createRouter, createWebHistory } from 'vue-router';
import EditProduct from '../components/EditProduct.vue';
import CreateAnimal from "../components/CreateAnimal.vue";
import Registration from "../components/Registration.vue";
import HomePage from "../components/HomePage.vue";
import Pets from "../components/Pets.vue";
import AdoptAnimal from '../components/AdoptAnimal.vue';
import PetDetailsPage from '../components/PetDetailsPage.vue';
import Navbar from "../components/Navbar.vue";

const routes = [
    {
        path: '/',
        component: HomePage,
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
    },
    {
        path: '/navbar',
        component: Navbar,
    },
    {
        path: '/pets',
        component: Pets,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
