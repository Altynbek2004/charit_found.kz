<template>

    <Navbar></Navbar>
    <!-- Hero section -->
    <section class="flex justify-center bg-blue-200 p-6">
        <img src="/storage/app/public/imageMenu/dog.png" alt="Pets" class="rounded-lg shadow-lg" />
    </section>

    <div class="text-center text-2xl font-bold mt-6 mb-4"><h1>Приют “Амиго”</h1></div>

    <!-- About Section -->
    <section class="flex flex-col md:flex-row bg-white p-6 items-start justify-center gap-10">
        <!-- Сол жақтағы сурет -->
        <div class="flex justify-center md:w-1/2">
            <img src="/storage/app/public/imageMenu/amigo.png" alt="Амиго Лого" class="w-170 h-190" />
        </div>

        <!-- Оң жақтағы текст + кнопка -->
        <div class="md:w-1/2 text-lg font-medium space-y-4 flex flex-col justify-between h-full">
            <div class="space-y-2">
                <p>описание</p>
                <p>описание</p>
                <p>описание</p>
                <p>описание</p>
                <p>описание</p>
            </div>

            <!-- Кнопка оң төменде -->
            <div class="flex justify-end mt-150 mr-30">
                <button class="bg-blue-200 hover:bg-blue-300 px-4 py-2 rounded text-black font-bold">
                    Сделать пожертвование
                </button>
            </div>
        </div>
    </section>

</template>

<script>
import axios from 'axios';
import Navbar from "./Navbar.vue";

export default {
    name: 'HomePage',
    components: {
        Navbar,
    },
    data() {
        return {
            products: [],
        };
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
