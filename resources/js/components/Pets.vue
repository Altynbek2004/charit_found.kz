<template>
    <Navbar>

    </Navbar>
    <div class="bg-blue-100 p-6 w-full">
        <h2 class="text-center text-xl font-bold mb-6">Щенок Имя</h2>

        <div class="flex mx-6">
            <div class="w-1/3">
                <div class="bg-white p-4">
                    <img src="/storage/app/public/imageMenu/pets.png" alt="Корги щенок" class="w-full">
                </div>
            </div>

            <div class="ps-150 pt-6">
                <p>описание</p>
                <p>описание</p>
                <p>описание</p>
                <p>описание</p>
                <p>описание</p>
            </div>
        </div>
    </div>
    <div class="bg-blue-100 p-6 w-full">
        <h3 class="text-center text-xl font-bold mb-6">
            lorem ipsum
        </h3>
        <div class="flex justify-center">
            <button class="bg-[#FFFDFB] text-center px-4 py-1 rounded">
                Приютить
            </button>
        </div>
    </div>


</template>

<script>
    import Navbar from "./Navbar.vue";

    export default {
    name: 'PuppyCard',
        components: {Navbar}
    }
</script>

<style scoped>
</style>
