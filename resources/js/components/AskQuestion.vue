<template>
    <div class="bg-blue-100 min-h-screen p-6">
        <h2 class="text-xl font-bold text-center mb-4">
            {{ $t('askQuestion.title') }}
        </h2>

        <div class="bg-blue-50 rounded-lg p-6 max-w-4xl mx-auto shadow min-h-[800px] flex flex-col justify-between">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold">{{ $t('askQuestion.chat') }}</h3>
                <button
                    @click="clearChat"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded text-sm"
                    :disabled="messages.length <= 1"
                >
                    {{ $t('askQuestion.clear') }}
                </button>
            </div>

            <!-- Сообщения -->
            <div class="overflow-y-auto h-[600px] space-y-4 mb-6" ref="messagesContainer">
                <div v-if="messages.length === 0" class="text-center text-gray-500 italic">
                    {{ $t('askQuestion.start') }}
                </div>
                <div v-for="(msg, index) in messages" :key="index"
                     :class="[
                        msg.role === 'user' ? 'bg-gray-200 ml-auto' : 'bg-blue-200',
                        'rounded px-4 py-2 max-w-sm break-words'
                    ]">
                    {{ msg.content }}
                </div>
                <div v-if="loading" class="bg-blue-200 rounded px-4 py-2 max-w-sm">
                    <span class="loading-animation">{{ $t('askQuestion.typing') }}<span>.</span><span>.</span><span>.</span></span>
                </div>
            </div>

            <form @submit.prevent="sendMessage" class="flex flex-col sm:flex-row w-full">
                <input
                    type="text"
                    v-model="userMessage"
                    :placeholder="$t('askQuestion.input')"
                    class="w-full sm:flex-1 px-4 py-2 rounded-t sm:rounded-l sm:rounded-tr-none border border-gray-300 focus:outline-none"
                    maxlength="255"
                    :disabled="loading"
                />
                <button
                    type="submit"
                    class="w-full sm:w-auto bg-blue-500 text-white px-6 py-2 rounded-b sm:rounded-r sm:rounded-bl-none hover:bg-blue-600 disabled:bg-blue-300 transition"
                    :disabled="loading || !userMessage.trim()"
                >
                    {{ $t('askQuestion.send') }}
                </button>
            </form>

        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            userMessage: '',
            messages: [],
            loading: false,
            apiKey: 'AIzaSyAALKQv-SwkcGekyP3BvWH4P-XLk49zSJ4', // Замените на свой API-ключ Gemini
            // Инициализируем новый объект для хранения идентификатора сессии
            sessionId: null
        };
    },
    methods: {
        async sendMessage() {
            if (!this.userMessage.trim()) return;

            // Добавляем сообщение пользователя в чат
            const userMessageText = this.userMessage.trim();
            this.messages.push({ role: 'user', content: userMessageText });
            this.userMessage = '';
            this.loading = true;

            try {
                let response;

                // Если сессии еще нет, создаем новую сессию
                if (!this.sessionId) {
                    // Создаем новую сессию чата с Gemini
                    response = await axios.post(
                        `https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=${this.apiKey}`,
                        {
                            contents: [{
                                role: "user",
                                parts: [{ text: userMessageText }]
                            }],
                            generationConfig: {
                                temperature: 0.7,
                                maxOutputTokens: 1000,
                            }
                        },
                        {
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        }
                    );
                } else {
                    // Отправляем сообщение в существующую сессию
                    response = await axios.post(
                        `https://generativelanguage.googleapis.com/v1beta/models/gemini-1.0-pro:generateContent?key=${this.apiKey}`,
                        {
                            contents: [{
                                role: "user",
                                parts: [{ text: userMessageText }]
                            }],
                            generationConfig: {
                                temperature: 0.7,
                                maxOutputTokens: 1000,
                            }
                        },
                        {
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        }
                    );
                }

                // Обработка ответа
                if (response.data &&
                    response.data.candidates &&
                    response.data.candidates.length > 0 &&
                    response.data.candidates[0].content &&
                    response.data.candidates[0].content.parts &&
                    response.data.candidates[0].content.parts.length > 0) {

                    const aiResponse = response.data.candidates[0].content.parts[0].text;
                    this.messages.push({ role: 'assistant', content: aiResponse });

                } else {
                    throw new Error('Некорректный формат ответа API');
                }
            } catch (error) {
                console.error('Ошибка при отправке запроса:', error);
                this.messages.push({
                    role: 'assistant',
                    content: 'Извините, произошла ошибка при обработке вашего запроса. Пожалуйста, попробуйте еще раз позже.'
                });
            } finally {
                this.loading = false;
                this.$nextTick(() => {
                    this.scrollToBottom();
                });
            }
        },
        scrollToBottom() {
            if (this.$refs.messagesContainer) {
                this.$refs.messagesContainer.scrollTop = this.$refs.messagesContainer.scrollHeight;
            }
        },
        clearChat() {
            // Оставляем только приветственное сообщение
            this.messages = [{
                role: 'assistant',
                content: this.$t('greeting')
            }];
            this.sessionId = null;
        }
    },
    mounted() {
        // Приветственное сообщение при загрузке чата
        const welcomeMessage = this.$t('greeting');
        this.messages.push({
            role: 'assistant',
            content: welcomeMessage,
            isGreeting: true
        });
    },
    watch: {
        '$i18n.locale'(newLocale, oldLocale) {
            const welcomeIndex = this.messages.findIndex(m => m.role === 'assistant' && m.isGreeting);
            if (welcomeIndex !== -1) {
                this.messages[welcomeIndex].content = this.$t('greeting');
            }
        }
    },
    updated() {
        this.scrollToBottom();
    }
};
</script>

<style scoped>
.loading-animation span {
    animation: dots 1.5s infinite;
    opacity: 0;
}
.loading-animation span:nth-child(1) {
    animation-delay: 0s;
}
.loading-animation span:nth-child(2) {
    animation-delay: 0.5s;
}
.loading-animation span:nth-child(3) {
    animation-delay: 1s;
}
@keyframes dots {
    0%, 100% { opacity: 0; }
    50% { opacity: 1; }
}
</style>
