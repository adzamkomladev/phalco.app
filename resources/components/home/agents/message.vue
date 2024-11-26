<script setup lang="ts">
const chatData = [
    { id: 1, user: "me", message: "Hey! How are you?", timestamp: "10:15 AM" },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
    {
        id: 2,
        user: "other",
        message: "Hi! I'm good, thanks. What about you?",
        timestamp: "10:16 AM",
    },
];
</script>

<template>
    <!-- Header -->
    <div class="flex items-center px-5 gap-2 border-b">
        <div>
            <SharedCommonIcon name="arrow_up" class="rotate-90" />
        </div>
        <div class="py-3">
            <div class="flex items-center gap-x-3">
                <img
                    class="inline-block size-9 rounded-full"
                    src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&&auto=format&fit=facearea&facepad=3&w=300&h=300&q=80"
                    alt="Avatar"
                />
                <div class="grow">
                    <span
                        class="block font-semibold text-gray-800 dark:text-gray-200"
                    >
                        Komla Adzam
                    </span>
                    <p class="text-sm text-gray-500 flex items-center gap-2">
                        Active-now
                        <span class="block size-2 rounded-full bg-forest-300" />
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Container -->
    <div class="flex flex-col h-full px-5 py-5">
        <div
            ref="chatContainer"
            class="flex flex-col gap-4 max-w-2xl place-self-center overflow-y-auto flex-grow no-scrollbar"
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
                        'relative flex text-sm max-w-[75%] px-4 py-2 rounded-3xl shadow-sm flex-col',
                        chat.user === 'me'
                            ? 'bg-[#07689F] text-white ml-auto rounded-br-none'
                            : 'bg-[#38373710] rounded-bl-none border border-gray-200 rounded-2xl dark:bg-neutral-900 dark:border-neutral-70 text-sm text-gray-800 dark:text-white',
                    ]"
                >
                    <p class="text-sm">{{ chat.message }}</p>
                    <span
                        :class="[
                            'text-[10px]',
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
    </div>

    <!-- Input Field -->
    <div class="sticky bottom-0 bg-white dark:bg-gray-800 px-5 py-3">
        <SharedCommonChatInput />
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
    height: calc(100vh - 185px); /* Adjust as needed */
    scroll-behavior: smooth;
}

.sticky {
    position: sticky;
    z-index: 10;
}
</style>