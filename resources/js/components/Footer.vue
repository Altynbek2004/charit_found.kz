<template>
    <!-- Footer -->
    <footer class="bg-gray-100 mt-12">
        <div class="w-full bg-gray-100 px-6 py-8">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="font-bold text-lg mb-3">О платформе</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>О проекте Adoptly</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Как это работает</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Часто задаваемые вопросы (FAQ)</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Отзывы пользователей</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Партнёрам и волонтёрам</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="font-bold text-lg mb-3">Контакты</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <span class="text-red-500 mr-2">•</span>
                                <span>г. Алматы</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>+7 (775) 593 88 08</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>support@adoptly.kz</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Пн–Пт: 09:00–18:00</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="font-bold text-lg mb-3">Мы в сети</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Instagram</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>WhatsApp</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Telegram</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Facebook</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="font-bold text-lg mb-3">Документы</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Политика конфиденциальности</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Пользовательское соглашение</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Условия обработки персональных данных</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Правила размещения объявлений</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="container mx-auto py-6 px-6 text-center text-gray-700">
                    <p>© {{ new Date().getFullYear() }} Компания. Все права защищены.</p>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
export default
{
    name: 'Footer',
}
</script>
<style scoped>

</style>
