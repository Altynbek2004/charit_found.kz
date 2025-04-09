<template>
    <div class="bg-blue-100 min-h-screen p-6">
        <h2 class="text-xl font-bold text-center mb-4">
            Задайте вопрос нашему чату-помощнику
        </h2>

        <div class="bg-blue-50 rounded-lg p-6 max-w-4xl mx-auto shadow  min-h-[800px] flex flex-col justify-between">
            <h3 class="text-lg font-bold text-center mb-6">Тут тип чат ИИ мен</h3>

            <!-- Сообщения -->
            <div class=" flex-1 overflow-auto space-y-4 mb-6">
                <!-- Сообщение пользователя -->
                <div class="bg-gray-200 rounded px-4 py-2 max-w-xs">
                    Привет! Расскажи про приют.
                </div>

                <!-- Ответ ИИ -->
                <div class=" bg-blue-200 rounded px-4 py-2 max-w-xs ml-auto">
                    Конечно! У нас есть много собак и кошек, которых можно приютить.
                </div>
            </div>

<!--            <div style="max-height: 300px; overflow-y: auto;">-->
<!--                <div class="p-3">-->

<!--                    <div v-for="(message, index) in requestClient"-->
<!--                         :key="index"-->
<!--                         class="">-->
<!--                        <div class="d-flex flex-column">-->
<!--                            <div-->
<!--                                :class="{ 'text-end': message.direction_id !== 'in', 'me-1': message.direction_id !== 'in' }"-->
<!--                                class="ps-3">-->
<!--                                                            <span class="font-weight-bold small">-->
<!--                                                                {{ message.name }} {{ message.surname }}-->
<!--                                                            </span>-->
<!--                            </div>-->
<!--                            <div v-if="message.direction_id == 'in'"-->
<!--                                 class="d-flex p-3 pt-0">-->
<!--                                <div class="avatar avatar-l me-2">-->
<!--                                    <img alt=""-->
<!--                                         class="rounded-circle"-->
<!--                                         src="http://www.gravatar.com/avatar/1e22faa0f24a974c9188289c9e2a74e1.jpg?s=80&d=mm&r=g">-->
<!--                                </div>-->
<!--                                <div class="flex-1">-->
<!--                                    <div class="w-xxl-75">-->
<!--                                        <div-->
<!--                                            class="hover-actions-trigger d-flex align-items-center">-->
<!--                                            <div class="chat-message bg-200 p-2 rounded-2">-->
<!--                                                {{ message.message }}-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="text-400 fs&#45;&#45;2"><span>{{-->
<!--                                                $dateFormat(message.date_id, 'full')-->
<!--                                            }}</span></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div v-else-->
<!--                                 class="d-flex p-3 pt-0">-->
<!--                                <div class="flex-1 d-flex justify-content-end">-->
<!--                                    <div class="w-100 w-xxl-75">-->
<!--                                        <div-->
<!--                                            class="hover-actions-trigger d-flex flex-end-center">-->
<!--                                            <div-->
<!--                                                class="bg-primary text-white p-2 rounded-2 chat-message light">-->
<!--                                                {{ message.message }}-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="text-400 fs&#45;&#45;2 text-end"><span>{{-->
<!--                                                $dateFormat(message.date_id, 'full')-->
<!--                                            }}</span></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="avatar avatar-l me-2 ms-2">-->
<!--                                    <img alt=""-->
<!--                                         class="rounded-circle"-->
<!--                                         src="http://www.gravatar.com/avatar/1e22faa0f24a974c9188289c9e2a74e1.jpg?s=80&d=mm&r=g">-->
<!--                                </div>-->
<!--                            </div>-->

<!--                        </div>-->
<!--                    </div>-->

<!--                </div>-->
<!--            </div>-->

            <!-- Форма отправки -->
            <div  class="flex">
                <input
                    type="text"
                    v-model="message"
                    placeholder="Введите сообщение..."
                    class="flex-1 px-4 py-2 rounded-l border-t border-l border-b border-gray-300 focus:outline-none"
                    maxlength="255"
                />
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-6 rounded-r hover:bg-blue-600"
                    @click="sendMessage"
                >
                    Отправить
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            message: '',
        };
    },
    methods: {
        sendMessage() {
            if (this.message.trim()) {
                alert(`Сообщение отправлено: ${this.message}`);
                this.message = '';
            }
        },
    },
};
</script>

<style scoped>

</style>
