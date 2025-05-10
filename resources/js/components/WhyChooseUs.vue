// ReasonsList.vue
<template>
    <div class="w-full min-h-screen bg-blue-50">
        <div class="container mx-auto px-4 py-12">
            <h1 class="text-4xl font-bold text-center mb-12">{{$t('whyChooseUs.title')}}</h1>

            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
                <div v-for="(reason, index) in reasons" :key="index"
                     class="bg-white p-6 rounded-lg shadow-md overflow-hidden">
                    <h2 class="text-2xl font-semibold mb-4">{{ reason.title }}</h2>
                    <p class="text-gray-700 break-words overflow-hidden">{{ reason.text }}</p>
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
</style>
