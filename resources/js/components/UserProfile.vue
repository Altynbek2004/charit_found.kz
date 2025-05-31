<template>
    <div>
        <Navbar />

        <div class="flex justify-center items-start h-screen pt-20">
            <form class="bg-white shadow-lg p-6 rounded-lg w-full max-w-md space-y-4">
                <input
                    v-model="form.id"
                    type="text"
                    placeholder="ID"
                    class="w-full p-2 border rounded"
                />
                <input
                    v-model="form.name"
                    type="text"
                    placeholder="Name"
                    class="w-full p-2 border rounded"
                />
                <input
                    v-model="form.surname"
                    type="text"
                    placeholder="Surname"
                    class="w-full p-2 border rounded"
                />
                <input
                    v-model="form.email"
                    type="email"
                    placeholder="Email"
                    class="w-full p-2 border rounded"
                    readonly
                />
                <input
                    v-model="form.password"
                    type="password"
                    placeholder="Password"
                    class="w-full p-2 border rounded"
                />
                <button
                    @click.prevent="updateProfile"
                    class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600"
                >
                    Жаңарту
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Navbar from "../components/Navbar.vue";

export default {
    name: "UserProfile",
    components: { Navbar },
    data() {
        return {
            form: {
                id: '',
                name: '',
                surname: '',
                email: '',
                password: ''
            }
        };
    },
    mounted() {
        this.fetchUser();
    },
    methods: {
        async fetchUser() {
            try {
                const response = await axios.get('/api/user');

                if (response.data.success) {
                    const user = response.data.user[0];
                    this.form.id = user.id || '';
                    this.form.name = user.name || '';
                    this.form.surname = user.surname || '';
                    this.form.email = user.email || '';
                } else {
                    alert("Қолданушы табылмады");
                }
            } catch (error) {
                console.error('Қате:', error);
                alert("Қате орын алды");
            }
        },

        async updateProfile() {
            try {
                const token = localStorage.getItem('token');
                const response = await axios.put(
                    `/api/user/${this.form.id}`,
                    this.form,
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                            'Content-Type': 'application/json'
                        }
                    }
                );

                if (response.data.success) {
                    alert("Деректер сәтті жаңартылды");
                } else {
                    alert("Жаңарту кезінде қате орын алды");
                }
            } catch (error) {
                console.error(error);
                alert("Серверде қате орын алды");
            }
        }

    }
}
</script>
