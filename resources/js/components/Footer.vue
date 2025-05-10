<template>
    <!-- Footer -->
    <footer class="bg-gray-100 mt-12">
        <div class="w-full bg-gray-100 px-6 py-8">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="font-bold text-lg mb-3">{{$t('footer.about')}}</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>{{$t('footer.about1')}}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>{{$t('footer.works')}}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>{{$t('footer.questions')}}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>{{$t('footer.comments')}}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>{{$t('footer.partner')}}</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="font-bold text-lg mb-3">{{$t('footer.contact')}}</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <span class="text-red-500 mr-2">•</span>
                                <span>{{$t('footer.city')}}</span>
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
                                <span>{{$t('footer.week')}}</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="font-bold text-lg mb-3">{{$t('footer.online')}}</h3>
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
                        <h3 class="font-bold text-lg mb-3">{{$t('footer.documents')}}</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>{{$t('footer.politic')}}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>{{$t('footer.agree')}}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>{{$t('footer.agree1')}}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>{{$t('footer.agree2')}}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="container mx-auto py-6 px-6 text-center text-gray-700">
                    <p>© {{ new Date().getFullYear() }} {{$t('footer.company')}}</p>
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
