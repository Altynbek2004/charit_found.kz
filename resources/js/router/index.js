import { createRouter, createWebHistory } from 'vue-router';
import ProductList from '../components/ProductList.vue';
import EditProduct from '../components/EditProduct.vue';
import CreateProduct from '../components/CreateProduct.vue';
import AdoptAnimal from '../components/AdoptAnimal.vue';
import AskQuestion from '../components/AskQuestion.vue';
import WhyChooseUs from '../components/WhyChooseUs.vue';

const routes = [
    {
        path: '/',
        component: ProductList,
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
        path: 'why-choose-us',
        component: WhyChooseUs,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
