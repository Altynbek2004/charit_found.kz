<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <div class="fixed left-0 top-0 h-full w-60 bg-white shadow-md z-10">
            <!-- Logo -->
            <div class="flex items-center px-5 h-16 border-b border-gray-100">
                <i class="fas fa-cube text-indigo-500 text-xl mr-2"></i>
                <span class="font-bold text-lg text-gray-800">StrikingDash</span>
            </div>

            <!-- Main Menu -->
            <div class="py-4">
                <div class="px-5 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    MAIN MENU
                </div>
                <ul class="mt-2">
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Dashboard</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="/admin/panel/users"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Users / Қолданушылар</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="/admin/panel/content"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Content Management / Контент басқару</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Products / Items</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Orders / Жазылулар</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Объявление / Хабарландыру</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Settings / Параметрлер</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Support / Жәрдем</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li class="px-3 py-2">
                        <a
                            href="#"
                            class="flex items-center px-2 py-2 text-gray-600 rounded-lg transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md hover:ring-1 hover:ring-gray-300"
                        >
                            <i class="fas fa-home text-gray-500 w-5"></i>
                            <span class="ml-3">Logs / History / Audit</span>
                            <i class="fas fa-chevron-down ml-auto text-xs text-gray-400"></i>
                        </a>
                    </li>
                </ul>

            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-60">
            <!-- Top Header -->
            <header class="bg-white h-16 flex items-center justify-between px-6 shadow-sm">
                <div class="flex items-center">
                    <button class="text-gray-500 focus:outline-none mr-4 cursor-pointer !rounded-button whitespace-nowrap">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <i class="fas fa-search text-gray-400"></i>
            </span>
                        <input type="text" placeholder="Search..." class="border-none bg-gray-100 rounded-lg pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 w-64" />
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-500 hover:text-gray-700 cursor-pointer !rounded-button whitespace-nowrap">
                        <i class="fas fa-cog text-xl"></i>
                    </button>
                    <button class="text-gray-500 hover:text-gray-700 cursor-pointer !rounded-button whitespace-nowrap">
                        <i class="far fa-question-circle text-xl"></i>
                    </button>
                    <button class="flex items-center cursor-pointer !rounded-button whitespace-nowrap">
                        <img src="https://readdy.ai/api/search-image?query=professional%20headshot%20of%20a%20business%20person%20with%20neutral%20expression%20on%20plain%20background%2C%20high%20quality%20portrait%2C%20professional%20looking&width=100&height=100&seq=avatar1&orientation=squarish" alt="User avatar" class="h-8 w-8 rounded-full object-cover" />
                    </button>
                </div>
            </header>

            <!---Main Content--->

            <AdminUsersList></AdminUsersList>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref, onMounted } from "vue";
import * as echarts from "echarts";
import axios from "axios";
import AdminUsersList from "../components/AdminUsersList.vue";
const users = ref([]);

const chart1Container = ref<HTMLElement | null>(null);
const chart2Container = ref<HTMLElement | null>(null);
const chart3Container = ref<HTMLElement | null>(null);
const chart4Container = ref<HTMLElement | null>(null);

onMounted(async () => {

    try {
        const response = await axios.get('/api/user');
        users.value = Array.isArray(response.data.user) ? response.data.user : [response.data.user];
    } catch (error) {
        console.error('Қате шықты ', error);
    }

    if (chart1Container.value) {
        const chart1 = echarts.init(chart1Container.value);
        chart1.setOption({
            animation: false,
            grid: {
                top: 5,
                right: 5,
                bottom: 5,
                left: 5,
                show: false
            },
            xAxis: {
                type: 'category',
                data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                show: false
            },
            yAxis: {
                type: 'value',
                show: false
            },
            series: [{
                data: [820, 932, 901, 934, 1290, 1130, 1020],
                type: 'line',
                smooth: true,
                symbol: 'none',
                lineStyle: {
                    color: '#10B981'
                },
                areaStyle: {
                    color: {
                        type: 'linear',
                        x: 0,
                        y: 0,
                        x2: 0,
                        y2: 1,
                        colorStops: [{
                            offset: 0, color: 'rgba(16, 185, 129, 0.2)'
                        }, {
                            offset: 1, color: 'rgba(16, 185, 129, 0)'
                        }]
                    }
                }
            }]
        });
    }

    // Chart 2 - Page Impressions
    if (chart2Container.value) {
        const chart2 = echarts.init(chart2Container.value);
        chart2.setOption({
            animation: false,
            grid: {
                top: 5,
                right: 5,
                bottom: 5,
                left: 5,
                show: false
            },
            xAxis: {
                type: 'category',
                data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                show: false
            },
            yAxis: {
                type: 'value',
                show: false
            },
            series: [{
                data: [720, 832, 1001, 834, 1090, 1330, 920],
                type: 'line',
                smooth: true,
                symbol: 'none',
                lineStyle: {
                    color: '#EC4899'
                },
                areaStyle: {
                    color: {
                        type: 'linear',
                        x: 0,
                        y: 0,
                        x2: 0,
                        y2: 1,
                        colorStops: [{
                            offset: 0, color: 'rgba(236, 72, 153, 0.2)'
                        }, {
                            offset: 1, color: 'rgba(236, 72, 153, 0)'
                        }]
                    }
                }
            }]
        });
    }

    // Chart 3 - Total Page Likes
    if (chart3Container.value) {
        const chart3 = echarts.init(chart3Container.value);
        chart3.setOption({
            animation: false,
            grid: {
                top: 5,
                right: 5,
                bottom: 5,
                left: 5,
                show: false
            },
            xAxis: {
                type: 'category',
                data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                show: false
            },
            yAxis: {
                type: 'value',
                show: false
            },
            series: [{
                data: [620, 732, 901, 934, 1290, 830, 1320],
                type: 'line',
                smooth: true,
                symbol: 'none',
                lineStyle: {
                    color: '#6366F1'
                },
                areaStyle: {
                    color: {
                        type: 'linear',
                        x: 0,
                        y: 0,
                        x2: 0,
                        y2: 1,
                        colorStops: [{
                            offset: 0, color: 'rgba(99, 102, 241, 0.2)'
                        }, {
                            offset: 1, color: 'rgba(99, 102, 241, 0)'
                        }]
                    }
                }
            }]
        });
    }

    // Chart 4 - Page Impressions
    if (chart4Container.value) {
        const chart4 = echarts.init(chart4Container.value);
        chart4.setOption({
            animation: false,
            grid: {
                top: 5,
                right: 5,
                bottom: 5,
                left: 5,
                show: false
            },
            xAxis: {
                type: 'category',
                data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                show: false
            },
            yAxis: {
                type: 'value',
                show: false
            },
            series: [{
                data: [520, 932, 701, 834, 1090, 1330, 920],
                type: 'line',
                smooth: true,
                symbol: 'none',
                lineStyle: {
                    color: '#F59E0B'
                },
                areaStyle: {
                    color: {
                        type: 'linear',
                        x: 0,
                        y: 0,
                        x2: 0,
                        y2: 1,
                        colorStops: [{
                            offset: 0, color: 'rgba(245, 158, 11, 0.2)'
                        }, {
                            offset: 1, color: 'rgba(245, 158, 11, 0)'
                        }]
                    }
                }
            }]
        });
    }
});
</script>

<style scoped>
.fa-facebook-f {
    font-size: 1.5rem;
}

.fa-twitter {
    font-size: 1.5rem;
}

.fa-instagram {
    font-size: 1.5rem;
}

.fa-youtube {
    font-size: 1.5rem;
}

.fa-pinterest-p {
    font-size: 1.5rem;
}

.fa-linkedin-in {
    font-size: 1.5rem;
}

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>
