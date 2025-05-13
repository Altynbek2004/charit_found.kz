<template>
    <div id="top">
        <Navbar></Navbar>
        <section class="bg-blue-200 py-12">
            <div class="container mx-auto max-w-screen-xl px-4 relative">
                <!-- Image Carousel -->
                <div class="overflow-hidden rounded-xl shadow-xl relative h-[450px] md:h-[600px]">
                    <transition-group name="fade" tag="div">
                        <img
                            v-for="(image, index) in images"
                            v-show="index == currentIndex"
                            :key="index"
                            :src="image.src"
                            :alt="image.alt"
                            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 transform hover:scale-105"
                        />
                    </transition-group>

                    <!-- Overlay Text -->
                    <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent text-white p-6">
                        <h2 class="text-3xl font-bold animate__animated animate__fadeIn animate__delay-1s">{{ images[currentIndex].alt }}</h2>
                    </div>

                    <!-- Indicators -->
                    <div class="absolute bottom-4 right-4 flex gap-3">
                <span
                    v-for="(image, i) in images"
                    :key="'dot-' + i"
                    class="w-4 h-4 rounded-full transition-all duration-300 transform hover:scale-110"
                    :class="i === currentIndex ? 'bg-blue-500' : 'bg-white/50'"
                    @click="currentIndex = i"
                ></span>
                    </div>
                </div>
            </div>
        </section>


        <div class="text-center mt-8 mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $t('shelter.name') }}</h1>
            <div class="h-1 w-24 bg-blue-500 mx-auto mt-2"></div>
        </div>

        <section id="about" class="py-12 bg-white">
            <div class="container mx-auto max-w-screen-xl px-4">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <!-- Image Section -->
                    <div class="w-full md:w-2/5 animate__animated animate__fadeIn animate__delay-1s">
                        <div class="rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-all duration-300">
                            <img
                                src="/storage/app/public/imageMenu/amigo.png"
                                alt="Логотип приюта Амиго"
                                class="w-full h-auto object-cover rounded-lg"
                            />
                        </div>
                    </div>

                    <!-- Text Section -->
                    <div class="w-full md:w-3/5 animate__animated animate__fadeIn animate__delay-2s">
                        <h2 class="text-3xl font-semibold text-blue-600 mb-6">{{ $t('shelter.aboutTitle') }}</h2>

                        <div class="text-gray-700 space-y-6 text-lg">
                            <p>{{ $t('shelter.description1') }}</p>
                            <p>{{ $t('shelter.description2') }}</p>
                            <p>{{ $t('shelter.description3') }}</p>
                            <p>{{ $t('shelter.description4') }}</p>
                            <p class="font-semibold text-blue-600 italic">{{ $t('shelter.motto') }}</p>
                        </div>

                        <!-- Buttons Section -->
                        <div class="mt-8 flex space-x-4">
                            <a
                                href="#contact"
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-8 rounded-full transition-all duration-300 transform hover:scale-105"
                            >
                                {{ $t('buttons.contact') }}
                            </a>
                            <a
                                href="#help"
                                class="inline-block bg-white border-2 border-blue-600 hover:bg-blue-50 text-blue-600 font-medium py-3 px-8 rounded-full transition-all duration-300 transform hover:scale-105"
                            >
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
            images: [
                {
                    src: "/storage/imageMenu/navbarAdopt1.PNG",
                    alt: "Милый пёсик",
                },
                {
                    src: "/storage/imageMenu/navbarAdopt2.PNG",
                    alt: "Очаровательный котик",
                },
                {
                    src: "/storage/imageMenu/navbarAdopt3.PNG",
                    alt: "Пушистый кролик",
                },
            ],
            currentIndex: 0,
            intervalId: null,
        };
    },
    mounted() {
        this.startCarousel();
    },
    beforeDestroy() {
        clearInterval(this.intervalId);
    },
    components: {
        FindAnimal, AdoptAnimal, AskQuestion, EverythingForAnimals, WhyChooseUs, ContactUs, Footer, Navbar
    },
    methods: {
        startCarousel() {
            this.intervalId = setInterval(() => {
                this.currentIndex = (this.currentIndex + 1) % this.images.length;
            }, 3000);
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

.fade-enter-active,
.fade-leave-active {
    transition: opacity 1s ease;
}
.fade-enter, .fade-leave-to {
    opacity: 0;
}
</style>
