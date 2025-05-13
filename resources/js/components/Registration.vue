<template>
    <Navbar />

    <section class="flex flex-col items-center bg-sky-100 p-6 min-h-screen">
        <div class="w-full max-w-4xl bg-white p-6 rounded-2xl shadow-2xl transition duration-500 hover:shadow-blue-300">
            <h2 class="text-center text-3xl font-bold text-sky-600 mb-8">Регистрация</h2>

            <form
                class="w-full max-w-md mx-auto"
                method="POST"
                @submit.prevent="handleSubmit"
                enctype="multipart/form-data"
            >
                <!-- Имя -->
                <div class="mb-5">
                    <label for="name" class="block text-sky-700 font-semibold mb-1">Имя</label>
                    <input
                        type="text"
                        id="name"
                        v-model="form.name"
                        class="w-full px-4 py-2 border border-sky-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition duration-300 hover:ring-1 hover:ring-sky-300"
                    />
                </div>

                <!-- Фамилия -->
                <div class="mb-5">
                    <label for="surname" class="block text-sky-700 font-semibold mb-1">Фамилия</label>
                    <input
                        type="text"
                        id="surname"
                        v-model="form.surname"
                        class="w-full px-4 py-2 border border-sky-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition duration-300 hover:ring-1 hover:ring-sky-300"
                    />
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block text-sky-700 font-semibold mb-1">Электронные почта</label>
                    <input
                        type="email"
                        id="email"
                        v-model="form.email"
                        class="w-full px-4 py-2 border border-sky-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition duration-300 hover:ring-1 hover:ring-sky-300"
                    />
                </div>

                <!-- Пароль -->
                <div class="mb-5">
                    <label for="password" class="block text-sky-700 font-semibold mb-1">Пароль</label>
                    <input
                        type="password"
                        id="password"
                        v-model="form.password"
                        class="w-full px-4 py-2 border border-sky-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition duration-300 hover:ring-1 hover:ring-sky-300"
                    />
                </div>

                <!-- Аватар -->
                <div class="mb-6">
                    <label for="avatar" class="block text-sky-700 font-semibold mb-1">Аватар</label>
                    <input
                        type="file"
                        id="avatar"
                        name="image"
                        @change="handleFileUpload"
                        class="w-full px-4 py-2 border border-sky-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition duration-300 hover:ring-1 hover:ring-sky-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-sky-100 file:text-sky-700 hover:file:bg-sky-200"
                    />
                </div>

                <!-- Кнопка -->
                <button
                    type="submit"
                    class="w-full bg-sky-500 text-white py-2 rounded-lg font-semibold shadow-md hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-400 transition duration-300 transform hover:-translate-y-0.5 hover:shadow-lg"
                >
                    Зарегистрироваться
                </button>
            </form>
        </div>
    </section>



    <Footer />
</template>

<script>
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'
import axios from 'axios'

export default {
    components: {
        Navbar,
        Footer
    },
    data() {
        return {
            form: {
                name: '',
                surname: '',
                email: '',
                password: '',
                avatar: null
            }
        }
    },
    methods: {
        handleFileUpload(event) {
            const file = event.target.files[0]
            if (file) {
                this.form.avatar = file
                console.log("Таңдалған файл:", file)
            }
        },
        async handleSubmit() {
            try {
                const formData = new FormData()
                formData.append('name', this.form.name)
                formData.append('surname', this.form.surname)
                formData.append('email', this.form.email)
                formData.append('password', this.form.password)
                if (this.form.avatar) {
                    formData.append('image', this.form.avatar)
                }

                const response = await axios.post('/register', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                alert(response.data.message)
            } catch (error) {
                console.log(error)
                alert("Қате: " + (error.response?.data?.message || "Сервер қатесі"))
            }
        }
    }
}
</script>

<style>
</style>
