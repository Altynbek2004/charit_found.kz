<template>
    <Navbar />

    <section class="flex flex-col items-center bg-blue-200 p-6 h-170">
        <div class="container mx-auto max-w-screen-xl px-4 flex justify-between items-center">
            <div class="w-[1590px] bg-blue-100 p-6 rounded-lg shadow-lg">
                <h2 class="text-center text-2xl font-bold mb-4">Регистрация</h2>
                <form class="w-96 mx-auto" method="POST" @submit.prevent="handleSubmit" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Имя</label>
                        <input
                            type="text"
                            id="name"
                            v-model="form.name"
                            class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="surname" class="block text-gray-700">Фамилия</label>
                        <input
                            type="text"
                            id="surname"
                            v-model="form.surname"
                            class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Электронные почта</label>
                        <input
                            type="email"
                            id="email"
                            v-model="form.email"
                            class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Пароль</label>
                        <input
                            type="password"
                            id="password"
                            v-model="form.password"
                            class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="avatar" class="block text-gray-700">Аватар</label>
                        <input
                            type="file"
                            id="avatar"
                            name="image"
                            @change="handleFileUpload"
                            class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>
                    <button
                        type="submit"
                        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        Зарегистрироваться
                    </button>
                </form>
            </div>
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
