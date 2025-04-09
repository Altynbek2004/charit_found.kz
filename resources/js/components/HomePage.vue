<template>
    <body class="font-sans">
    <header class="flex justify-between items-center p-4 bg-blue-100 w-[1590px] mx-auto">
        <!-- Сол жақ бөлік -->
        <div class="flex items-center gap-4 text-sm font-bold">
            <span>+7 775 593 88 08</span>
            <span>email</span>
        </div>

        <!-- Оң жақ бөлік -->
        <div class="flex gap-2 ml-auto">
            <img src="/storage/app/public/imageMenu/image%2011.png" class="w-10 h-10" alt="Instagram" />
            <img src="/storage/app/public/imageMenu/image%2012.png" class="w-10 h-10" alt="WhatsApp" />
            <img src="/storage/app/public/imageMenu/image%2013.png" class="w-10 h-10" alt="Telegram" />
        </div>
    </header>





    <!-- Navigation -->
    <nav class="flex justify-between items-center bg-white shadow-sm p-4">
        <!-- Сол жақтағы логотип -->
        <div class="flex items-center gap-4 ml-40">
            <img src="/storage/app/public/imageMenu/logo_chari_found.png" alt="Logo" class="h-20" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </div>

        <!-- Орталық навигация -->
        <ul class="flex space-x-4 font-bold">
            <li><a href="#" class="hover:underline">Главная</a></li>
            <li class="border-b-4 border-blue-400 pb-1">О нас</li>
            <li><a href="#" class="hover:underline">Питомцы</a></li>
            <li><a href="#" class="hover:underline">Чат-помощник</a></li>
        </ul>

        <!-- Оң жақтағы сілтемелер -->
        <div class="flex items-center gap-10  mr-44">
            <span class="text-lg font-bold">RU</span>
            <span class="text-lg font-bold">Войти</span>
        </div>
    </nav>

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


    </body>

</template>

<script>
import axios from 'axios';

export default {
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
