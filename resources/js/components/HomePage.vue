<template>

    <Navbar></Navbar>
    <!-- Hero section -->
    <section class="bg-blue-200 py-6">
        <div class="container mx-auto max-w-screen-xl px-4">
            <img src="/storage/app/public/imageMenu/dog.png" alt="Pets" class="rounded-lg shadow-lg w-full h-auto object-cover" />
        </div>
    </section>


    <div class="text-center text-2xl font-bold mt-6 mb-4"><h1>Приют “Амиго”</h1></div>

    <section class="py-4">
        <div class="container mx-auto max-w-screen-xl flex justify-between items-center px-4">
            <div class="flex flex-col md:flex-row items-center md:items-end gap-8">
                <div class="w-full md:w-1/2 flex justify-center">
                    <img src="/storage/app/public/imageMenu/amigo.png" alt="Amigo logo"
                         class="w-full h-auto object-contain border-none" />
                </div>

                <div class="w-full md:w-1/2 flex flex-col justify-end space-y-2 text-center md:text-left">
                    <p>описание</p>
                    <p>описание</p>
                    <p>описание</p>
                    <p>описание</p>
                    <p>описание</p>
                </div>
            </div>
        </div>

    </section>






    <find-animal></find-animal>
    <adopt-animal></adopt-animal>
    <ask-question></ask-question>
    <everything-for-animals></everything-for-animals>
    <why-choose-us></why-choose-us>
    <contact-us></contact-us>
    <Footer></Footer>

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
    FindAnimal, AdoptAnimal,AskQuestion,EverythingForAnimals,WhyChooseUs,ContactUs,Footer,Navbar
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
