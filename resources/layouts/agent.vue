<script setup lang="ts">
import { ref, computed, onMounted } from "vue";
import { useRoute, route } from "@hybridly/vue";

onMounted(() => {
    setTimeout(() => {
        window.HSStaticMethods?.autoInit();
    }, 100);
});

const { current } = useRoute();

// Extract the last segment of the current route
const pageName = computed(() => {
    const segments = current?.value?.split(".");
    return segments ? segments.at(-1) : null;
});

// Navigate to the given route
const goToPage = (routeName: string) => {
    route(routeName);
};
</script>

<template>
    <body class="bg-white">
        <main class="flex flex-col h-screen">
            <div
                class="portrait:pt-8 landscape:pt-[5vh] 2xtall:landscape:pt-10 -mt px-[10%] sm:portrait:px-[14%] sm:landscape:mt- pb-10 sm:landscape:px-0 sm:landscape:pr-[5vw] xl:pr-[8vw] z-10 bg-white rounded-t-[2.5rem] sm:landscape:rounded-t-none flex-1 sm:landscape:overflow-y-auto sm:landscape:h-screen dark:bg-gray-800"
            >
                <!-- Tab Navigation -->
                <div class="flex gap-10 w-fit text-lg relative mb-10">
                    <button
                        class="py-2 rounded focus:outline-none"
                        :class="
                            pageName === 'dashboard'
                                ? 'font-bold text-primary-600'
                                : ''
                        "
                        @click="goToPage('agent.index')"
                    >
                        Dashboard
                    </button>
                    <button
                        class="py-2 rounded focus:outline-none"
                        :class="
                            pageName === 'messages'
                                ? 'font-bold text-primary-600'
                                : ''
                        "
                        @click="goToPage('agent.message')"
                    >
                        Messages
                    </button>
                    <router-link :href="route('agent.message')">
                        ssssss
                    </router-link>
                    <!-- Active Tab Indicator -->
                    <div
                        class="bg-primary-500 h-[3px] transition-all duration-500 absolute w-[calc(50%)] bottom-0"
                        :style="{
                            right: pageName === 'dashboard' ? '50%' : '0',
                        }"
                    />
                </div>

                <!-- Page Content -->
                <transition name="fade" mode="out-in">
                    <slot />
                </transition>
            </div>
        </main>
    </body>
</template>

<style scoped>
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
.fade-enter-from {
    transform: translateY(5rem);
}
.fade-leave-to {
    transform: translateY(-5rem);
}
.fade-enter-active,
.fade-leave-active {
    transition: all 0.3s ease-out;
}
</style>
