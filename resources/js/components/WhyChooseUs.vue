<template>
    <div class="w-full min-h-screen bg-blue-50 py-12 px-4">
        <div class="container mx-auto">
            <h1 class="text-4xl font-extrabold text-center text-blue-600 mb-16 animate-fade-in-up">
                {{ $t('whyChooseUs.title') }}
            </h1>

            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
                <div
                    v-for="(reason, index) in reasons"
                    :key="index"
                    class="bg-white p-8 rounded-2xl shadow-xl transform transition-all duration-500 hover:scale-105 hover:shadow-2xl animate-slide-in"
                    :style="{ animationDelay: `${index * 150}ms` }"
                >
                    <h2 class="text-2xl font-bold text-blue-700 mb-4">{{ reason.title }}</h2>
                    <p class="text-gray-700 leading-relaxed">{{ reason.text }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ReasonsList',
    computed: {
        reasons() {
            return [
                {
                    title: this.$t('whyChooseUs.title1'),
                    text: this.$t('whyChooseUs.text1')
                },
                {
                    title: this.$t('whyChooseUs.title2'),
                    text: this.$t('whyChooseUs.text2')
                },
                {
                    title: this.$t('whyChooseUs.title3'),
                    text: this.$t('whyChooseUs.text3')
                },
                {
                    title: this.$t('whyChooseUs.title4'),
                    text: this.$t('whyChooseUs.text4')
                }
            ];
        }
    }

};
</script>

<style scoped>
.break-words {
    word-wrap: break-word;
    word-break: break-word;
}
/* Fade In Title */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out forwards;
}

/* Slide-in Cards */
@keyframes slideIn {
    0% {
        transform: translateY(20px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

.animate-slide-in {
    animation: slideIn 0.8s ease-out both;
}
</style>
