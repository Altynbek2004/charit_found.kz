<template>
    <div class="min-h-screen flex flex-col bg-gradient-to-b from-white to-blue-50">
        <!-- Header -->
        <header class="bg-white shadow-md sticky top-0 z-10 animate-fade-in">
            <div class="container mx-auto py-5 px-6">
                <h1 class="text-4xl font-extrabold text-center text-blue-600 drop-shadow-sm tracking-wide">
                    {{$t('buttons.contact')}}
                </h1>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto py-12 px-6 animate-fade-in-up">
            <div class="max-w-[1150px] mx-auto bg-white rounded-2xl shadow-lg p-10 transition-all duration-300">
                <!-- Contact Form -->
                <form @submit.prevent="submitForm" class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="transition-transform duration-300 hover:scale-[1.02]">
                            <label for="name" class="block text-sm font-semibold text-blue-700 mb-2">{{$t('contactUs.name')}}</label>
                            <input
                                type="text"
                                id="name"
                                v-model="form.name"
                                class="w-full px-5 py-3 border border-blue-200 rounded-xl focus:ring-4 focus:ring-blue-200 focus:outline-none transition duration-300"
                                required
                            />
                        </div>
                        <div class="transition-transform duration-300 hover:scale-[1.02]">
                            <label for="email" class="block text-sm font-semibold text-blue-700 mb-2">{{$t('recent.contactEmail')}}</label>
                            <input
                                type="email"
                                id="email"
                                v-model="form.email"
                                class="w-full px-5 py-3 border border-blue-200 rounded-xl focus:ring-4 focus:ring-blue-200 focus:outline-none transition duration-300"
                                required
                            />
                        </div>
                    </div>

                    <div class="transition-transform duration-300 hover:scale-[1.02]">
                        <label for="phone" class="block text-sm font-semibold text-blue-700 mb-2">{{$t('contactUs.phone')}}</label>
                        <input
                            type="tel"
                            id="phone"
                            v-model="form.phone"
                            class="w-full px-5 py-3 border border-blue-200 rounded-xl focus:ring-4 focus:ring-blue-200 focus:outline-none transition duration-300"
                        />
                    </div>

                    <div class="transition-transform duration-300 hover:scale-[1.02]">
                        <label for="subject" class="block text-sm font-semibold text-blue-700 mb-2">{{$t('contactUs.topic')}}</label>
                        <select
                            id="subject"
                            v-model="form.subject"
                            class="w-full px-5 py-3 border border-blue-200 rounded-xl focus:ring-4 focus:ring-blue-200 focus:outline-none transition duration-300"
                            required
                        >
                            <option value="" disabled selected>{{$t('contactUs.choooseTopic')}}</option>
                            <option value="general">{{$t('contactUs.topic1')}}</option>
                            <option value="support">{{$t('contactUs.topic2')}}</option>
                            <option value="billing">{{$t('contactUs.topic3')}}</option>
                            <option value="other">{{$t('contactUs.topic4')}}</option>
                        </select>
                    </div>

                    <div class="transition-transform duration-300 hover:scale-[1.02]">
                        <label for="message" class="block text-sm font-semibold text-blue-700 mb-2">{{$t('contactUs.message')}}</label>
                        <textarea
                            id="message"
                            v-model="form.message"
                            rows="5"
                            class="w-full px-5 py-3 border border-blue-200 rounded-xl focus:ring-4 focus:ring-blue-200 focus:outline-none transition duration-300 resize-none"
                            required
                        ></textarea>
                    </div>

                    <div class="text-center">
                        <button
                            type="submit"
                            class="px-10 py-3 bg-blue-600 text-white font-semibold text-lg rounded-full hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                            :disabled="submitting"
                        >
                            {{ submitting ? $t('contactUs.sending') : $t('contactUs.sendingMessage') }}
                        </button>
                    </div>
                </form>

                <!-- Success Message -->
                <transition name="fade">
                    <div v-if="submitted" class="mt-8 p-5 bg-green-100 border border-green-400 text-green-800 rounded-xl text-center">
                        <p class="text-lg font-medium">{{$t('contactUs.thanks')}}</p>
                        <p>{{ $t('contactUs.taken') }}</p>
                    </div>
                </transition>
            </div>

            <!-- Contact Information -->
            <div class="max-w-6xl mx-auto mt-14 grid grid-cols-1 md:grid-cols-3 gap-8 animate-fade-in-up">
                <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-xl transition duration-300">
                    <div class="inline-flex items-center justify-center w-14 h-14 bg-blue-100 text-blue-600 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-blue-800 mb-1">{{ $t('contactUs.phone') }}</h3>
                    <p class="text-gray-700">+7 (775) 775-75-75</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-xl transition duration-300">
                    <div class="inline-flex items-center justify-center w-14 h-14 bg-blue-100 text-blue-600 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-blue-800 mb-1">{{ $t('recent.contactEmail') }}</h3>
                    <p class="text-gray-700">animals@company.ru</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-xl transition duration-300">
                    <div class="inline-flex items-center justify-center w-14 h-14 bg-blue-100 text-blue-600 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-blue-800 mb-1">{{ $t('contactUs.address') }}</h3>
                    <p class="text-gray-700">{{ $t('contactUs.address1') }}</p>
                </div>
            </div>
        </main>
    </div>
</template>
<script>
import Footer from './Footer.vue';
export default {
    name: 'ContactUs',
    components: {
        Footer
    },
    data() {
        return {
            form: {
                name: '',
                email: '',
                phone: '',
                subject: '',
                message: ''
            },
            submitting: false,
            submitted: false
        }
    },
    methods: {
        submitForm() {
            this.submitting = true;

            // Имитация отправки данных на сервер
            setTimeout(() => {
                // Здесь можно добавить код для отправки данных на сервер
                console.log('Form submitted:', this.form);


                const params = this.form;
                axios.post('/contact-us/mail', params).then(response => {
                    // Сброс формы и установка флага успешной отправки
                    this.submitting = false;
                    this.submitted = true;

                    // Сброс формы
                    this.form = {
                        name: '',
                        email: '',
                        phone: '',
                        subject: '',
                        message: ''
                    };
                    if (response.data.success) {
                        setTimeout(() => {
                            this.submitted = false;
                        }, 5000);
                    }
                });

            }, 1500);
        }
    }
}
</script>


<style scoped>

@keyframes fade-in-up {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }

    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fade-in {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

.animate-fade-in {
    animation: fade-in 0.7s ease-in-out both;
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-in-out both;
}

.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to {
    opacity: 0;
}
</style>
