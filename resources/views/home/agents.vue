<script setup lang="ts">
useHead({
    title: "Agent",
});

onMounted(() => {
    setTimeout(() => {
        window.HSStaticMethods?.autoInit();
    }, 100);
});

// Track the active component
const activeComponent = ref("dashboard"); // Set the default component key (e.g., HomeAgents or messages)

// Update active component based on button click
const switchComponent = (component: string) => {
    activeComponent.value = component;
};
</script>

<template>
    <body class="bg-white h-full">
        <main class="flex flex-col">
            <div>
                <!-- Top Navigation Buttons -->
                <div
                    class="sticky pb-4 pt-4 top-0 bg-green-600 z-10 w-full place-content-center"
                >
                    <div
                        class="flex gap-10 bg-red-500 w-fit text-lg mobile:text-sm relative place-self-center"
   >
                        <!-- Dashboard Button -->
                        <button
                            @click="switchComponent('dashboard')"
                            class="py-2 rounded focus:outline-none"
                            :class="
                                activeComponent === 'dashboard'
                                    ? 'font-bold text-primary-600'
                                    : ''
                            "
                        >
                            Dashboard
                        </button>

                        <!-- Messages Button -->
                        <button
                            @click="switchComponent('messages')"
                            class="py-2 rounded focus:outline-none"
                            :class="
                                activeComponent === 'messages'
                                    ? 'font-semibold text-primary-500'
                                    : ''
                            "
                        >
                            Messages
                        </button>

                        <!-- Transition Bar -->
                        <div
                            class="bg-primary-500 h-[3px] transition-all duration-500 absolute w-[calc(45%)] bottom-0 rounded-full"
                            :style="{
                                right:
                                    activeComponent === 'dashboard'
                                        ? '55%'
                                        : '0',
                            }"
                        />
                    </div>
                </div>

                <!-- Dynamically Render the Active Component -->
                <transition name="fade" mode="out-in">
                    <HomeAgentsMessage />
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
