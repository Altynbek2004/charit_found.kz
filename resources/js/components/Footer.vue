<template>
    <!-- Footer -->
    <footer class="bg-white mt-12">
        <div class="w-full bg-white px-6 py-12">
            <div class="max-w-6xl mx-auto animate-fade-in">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                    <div class="group transition-transform duration-300 hover:-translate-y-1">
                        <h3 class="font-bold text-xl text-blue-500 mb-4">{{$t('footer.about')}}</h3>
                        <ul class="space-y-3 text-gray-700">
                            <li v-for="item in ['about1','works','questions','comments','partner']" :key="item" class="flex items-start hover:text-blue-500 transition-colors duration-300">
                                <span class="mr-2 text-blue-400">•</span>
                                <span>{{$t(`footer.${item}`)}}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="group transition-transform duration-300 hover:-translate-y-1">
                        <h3 class="font-bold text-xl text-blue-500 mb-4">{{$t('footer.contact')}}</h3>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start hover:text-blue-500 transition-colors duration-300">
                                <span class="mr-2 text-red-500">•</span>
                                <span>{{$t('footer.city')}}</span>
                            </li>
                            <li class="flex items-start hover:text-blue-500 transition-colors duration-300">
                                <span class="mr-2 text-blue-400">•</span>
                                <span>+7 (775) 593 88 08</span>
                            </li>
                            <li class="flex items-start hover:text-blue-500 transition-colors duration-300">
                                <span class="mr-2 text-blue-400">•</span>
                                <span>support@adoptly.kz</span>
                            </li>
                            <li class="flex items-start hover:text-blue-500 transition-colors duration-300">
                                <span class="mr-2 text-blue-400">•</span>
                                <span>{{$t('footer.week')}}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="group transition-transform duration-300 hover:-translate-y-1">
                        <h3 class="font-bold text-xl text-blue-500 mb-4">{{$t('footer.online')}}</h3>
                        <ul class="space-y-3 text-gray-700">
                            <li v-for="network in ['Instagram', 'WhatsApp', 'Telegram', 'Facebook']" :key="network" class="flex items-start hover:text-blue-500 transition-colors duration-300">
                                <span class="mr-2 text-blue-400">•</span>
                                <span>{{ network }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="group transition-transform duration-300 hover:-translate-y-1">
                        <h3 class="font-bold text-xl text-blue-500 mb-4">{{$t('footer.documents')}}</h3>
                        <ul class="space-y-3 text-gray-700">
                            <li v-for="doc in ['politic','agree','agree1','agree2']" :key="doc" class="flex items-start hover:text-blue-500 transition-colors duration-300">
                                <span class="mr-2 text-blue-400">•</span>
                                <span>{{$t(`footer.${doc}`)}}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="container mx-auto mt-10 px-6 text-center text-gray-600">
                    <p class="text-sm hover:text-blue-500 transition-colors duration-300">
                        © {{ new Date().getFullYear() }} {{$t('footer.company')}}
                    </p>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',
}
</script>

<style scoped>
@keyframes fade-in {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 0.8s ease-in-out;
}
</style>
