<template>
    <div id="top">
        <Navbar></Navbar>
        <!-- Hero section -->
        <section class="bg-blue-200 py-6">
            <div class="container mx-auto max-w-screen-xl px-4">
                <img src="/storage/app/public/imageMenu/dog.png" alt="Pets" class="rounded-lg shadow-lg w-full h-auto object-cover" />
            </div>
        </section>

        <div class="text-center mt-8 mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $t('shelter.name') }}</h1>
            <div class="h-1 w-24 bg-blue-500 mx-auto mt-2"></div>
        </div>

        <!-- О нас section -->
        <section id="about" class="py-6 bg-gray-50">
            <div class="container mx-auto max-w-screen-xl px-4">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="w-full md:w-2/5">
                        <div class="rounded-lg overflow-hidden shadow-lg">
                            <img src="/storage/app/public/imageMenu/amigo.png" alt="Логотип приюта Амиго"
                                 class="w-full h-auto object-cover" />
                        </div>
                    </div>

                    <div class="w-full md:w-3/5">
                        <h2 class="text-2xl font-semibold text-gray-700 mb-4">{{ $t('shelter.aboutTitle') }}</h2>

                        <div class="text-gray-600 space-y-4 text-lg">
                            <p>{{ $t('shelter.description1') }}</p>
                            <p>{{ $t('shelter.description2') }}</p>
                            <p>{{ $t('shelter.description3') }}</p>
                            <p>{{ $t('shelter.description4') }}</p>
                            <p class="font-semibold text-blue-600 italic">{{ $t('shelter.motto') }}</p>
                        </div>

                        <div class="mt-6">
                            <a href="#contact" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-6 rounded-full transition-colors duration-300">
                                {{ $t('buttons.contact') }}
                            </a>
                            <a href="#help" class="inline-block bg-white border border-blue-500 hover:bg-blue-50 text-blue-500 font-medium py-2 px-6 rounded-full ml-4 transition-colors duration-300">
                                {{ $t('buttons.help') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Питомцы section -->
        <section id="pets">
            <find-animal></find-animal>
            <adopt-animal></adopt-animal>
        </section>

        <!-- Чат-помощник section -->
        <section id="assistant">
            <ask-question></ask-question>
        </section>

        <everything-for-animals></everything-for-animals>
        <why-choose-us></why-choose-us>
        <contact-us id="contact"></contact-us>
        <Footer></Footer>
    </div>
</template>

<script>
import axios from 'axios';
import FindAnimal from "@/components/FindAnimal.vue";
import AdoptAnimal from "@/components/AdoptAnimal.vue";
import AskQuestion from "@/components/AskQuestion.vue";
import EverythingForAnimals from "@/components/EverythingForAnimals.vue";
import WhyChooseUs from "@/components/WhyChooseUs.vue";
import ContactUs from "@/components/ContactUs.vue";
import Footer from "@/components/Footer.vue";
import Navbar from "./Navbar.vue";

export default {
    name: 'HomePage',
    data() {
        return {
            products: [],
        };
    },
    components: {
        FindAnimal, AdoptAnimal, AskQuestion, EverythingForAnimals, WhyChooseUs, ContactUs, Footer, Navbar
    },
    async created() {
        const response = await axios.get('/api/products');
        this.products = response.data;
    },
    methods: {
        async deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                await axios.delete(`/api/products/${id}`);
                this.products = this.products.filter(product => product.id !== id);
            }
        },
    },
};
</script>

<style scoped>
/* Add some padding to section tops for smoother scrolling */
section {
    scroll-margin-top: 80px; /* Adjusts where the scroll stops, accounting for the fixed navbar height */
}

.create-btn, .delete-btn {
    margin-left: 10px;
    padding: 5px 10px;
    border: none;
    cursor: pointer;
}
.delete-btn {
    background-color: red;
    color: white;
}
.create-btn {
    display: block;
    margin-top: 20px;
    background-color: green;
    color: white;
    text-align: center;
    text-decoration: none;
    padding: 8px 12px;
}
</style>
