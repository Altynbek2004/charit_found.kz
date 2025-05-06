// ReasonsList.vue
<template>
    <div class="w-full min-h-screen bg-blue-50">
        <div class="container mx-auto px-4 py-12">
            <h1 class="text-4xl font-bold text-center mb-12">Почему нас выбирают?</h1>

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
    data() {
        return {
            reasons: [
                {
                    title: 'Интеграция ИИ',
                    text: 'Наш ИИ помогает быстро подобрать животное по вашим предпочтениям, учитывая породу, возраст, характер и условия содержания.'
                },
                {
                    title: 'Удобная геолокация',
                    text: 'Вы легко найдете животных, которые находятся рядом с вами — всё для того, чтобы процесс знакомства был проще и быстрее.'
                },
                {
                    title: 'Простота и адаптивность',
                    text: 'Наша платформа интуитивно понятна: вы без труда сможете найти любимца, пролистать анкеты, узнать подробности и связаться с приютом.'
                },
                {
                    title: 'Поддержка других приютов',
                    text: 'Мы сотрудничаем с множеством приютов, помогая им находить заботливых хозяев для их подопечных.'
                }
            ]

        };
    }
};
</script>

<style scoped>
.break-words {
    word-wrap: break-word;
    word-break: break-word;
}
</style>
