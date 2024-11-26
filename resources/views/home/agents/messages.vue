<script setup lang="ts">
function goBack() {
    window.history.back();
}
const chatData = [
    { id: 1, user: "me", message: "Hey! How are you?", timestamp: "10:15 AM" },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    { id: 1, user: "me", message: "Hey! How are you?", timestamp: "10:15 AM" },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    { id: 1, user: "me", message: "Hey! How are you?", timestamp: "10:15 AM" },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    { id: 1, user: "me", message: "Hey! How are you?", timestamp: "10:15 AM" },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    { id: 1, user: "me", message: "Hey! How are you?", timestamp: "10:15 AM" },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    { id: 1, user: "me", message: "Hey! How are you?", timestamp: "10:15 AM" },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    { id: 1, user: "me", message: "Hey! How are you?", timestamp: "10:15 AM" },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    { id: 1, user: "me", message: "Hey! How are you?", timestamp: "10:15 AM" },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    { id: 1, user: "me", message: "Hey! How are you?", timestamp: "10:15 AM" },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    { id: 1, user: "me", message: "Hey! How are you?", timestamp: "10:15 AM" },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    { id: 1, user: "me", message: "Hey! How are you?", timestamp: "10:15 AM" },
    {
        id: 2,
        user: "me",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
];

const message = ref("");
</script>

<template layout="agents">
    <div class="relative portrait:flex portrait:border-t">
        <!-- Header -->
        <div
            class="flex z-[2] items-center px-5 gap-2 border-b portrait:border portrait:w-72 lg:w-[40%]"
        >
            <button
                class="hover:bg-black/10 p-2 aspect-square rounded-full transition-all"
                @click="goBack"
            >
                <SharedCommonIcon
                    name="arrow_up"
                    class="rotate-90 portrait:hidden"
                />
            </button>
            <div class="py-3">
                <div
                    class="flex items-center gap-x-3 portrait:flex-col portrait:text-center"
                >
                    <img
                        class="inline-block size-9 rounded-full portrait:size-[70%]"
                        src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&&auto=format&fit=facearea&facepad=3&w=300&h=300&q=80"
                        alt="Avatar"
                    />
                    <div class="grow">
                        <span
                            class="block font-semibold text-gray-800 dark:text-gray-200"
                        >
                            Komla Adzam
                        </span>
                        <p
                            class="text-sm text-gray-500 flex items-center portrait:justify-center gap-2"
                        >
                            Active-now
                            <span
                                class="block size-2 rounded-full bg-forest-300"
                            />
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat Container -->
        <div class="flex flex-col w-full h-full px-5 bg-chat">
            <div
                ref="chatContainer"
                class="flex flex-col gap-4 p overflow-y-auto flex-grow h-[calc(100vh_-235px)] portrait:h-[calc(100vh_-200px)] no-scrollbar py-5"
            >
                <!-- Chat Messages -->
                <div v-for="chat in chatData" :key="chat.id" class="flex gap-2">
                    <img
                        v-if="chat.user !== 'me'"
                        class="inline-block size-9 rounded-full"
                        src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&&auto=format&fit=facearea&facepad=3&w=300&h=300&q=80"
                        alt="Avatar"
                    />
                    <div
                        :class="[
                            'relative flex text-sm max-w-[75%] px-4 pt-2 rounded-3xl shadow-sm flex-col',
                            chat.user === 'me'
                                ? 'bg-[#07689F] text-white ml-auto rounded-br-none'
                                : 'bg-[#38373710] rounded-bl-none border border-gray-200 rounded-2xl dark:bg-neutral-900 dark:border-neutral-70 text-sm text-gray-800 dark:text-white',
                        ]"
                    >
                        <p class="text-sm">{{ chat.message }}</p>
                        <span
                            :class="[
                                'text-[10px] ',
                                chat.user === 'me'
                                    ? 'text-gray-300 text-right'
                                    : 'text-gray-500',
                            ]"
                        >
                            {{ chat.timestamp }}
                        </span>
                    </div>
                </div>
            </div>
            {{ message }}
            <div
                class="w-[90%] portrait:w-[80%] place-self-center sticky bottom-0 py-3"
            >
                <SharedCommonChatInput v-model="message" />
            </div>
        </div>

        <!-- Input Field -->
    </div>
</template>

<style scoped>
.no-scrollbar::-webkit-scrollbar {
    display: none;
}

.no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.flex-grow {
    scroll-behavior: smooth;
}
</style>
