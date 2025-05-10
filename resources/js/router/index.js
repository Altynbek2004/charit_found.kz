import { createRouter, createWebHistory } from 'vue-router';
import Registration from "../components/Registration.vue";
import HomePage from "../components/HomePage.vue";
import AdoptAnimal from '../components/AdoptAnimal.vue';
import PetDetailsPage from '../components/PetDetailsPage.vue';
import AdoptPetDetailsPage from '../components/AdoptPetDetailsPage.vue';
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
});

export default router;
