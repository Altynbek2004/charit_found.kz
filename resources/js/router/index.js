import { createRouter, createWebHistory } from 'vue-router';
import EditProduct from '../components/EditProduct.vue';
import CreateProduct from '../components/CreateProduct.vue';
import CreateAnimal from "../components/CreateAnimal.vue";
import Registration from "../components/Registration.vue";
import HomePage from "../components/HomePage.vue";
import AdoptAnimal from '../components/AdoptAnimal.vue';
import AskQuestion from '../components/AskQuestion.vue';
import WhyChooseUs from '../components/WhyChooseUs.vue';
import EverythingForAnimals from '../components/EverythingForAnimals.vue';
import FindAnimal from '../components/FindAnimal.vue';

const routes = [
    {
        path: '/',
        // component: CreateProduct,
        component: HomePage,
    },
    {
        path: '/adopt-animal',
        component: AdoptAnimal,
    },
    {
        path: '/products/:id/edit',
        component: EditProduct,
    },
    {
        path: '/ask-question',
        component: AskQuestion,
    },
    {
        path: '/why-choose-us',
        component: WhyChooseUs,
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
        path: '/why-choose-us',
        component: WhyChooseUs,
    },
    {
        path: '/everything-for-animals',
        component: EverythingForAnimals,
    },
    {
        path: '/find-animal',
        component: FindAnimal,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
