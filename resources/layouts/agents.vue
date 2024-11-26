<script setup lang="ts">
onMounted(() => {
    setTimeout(() => {
        window.HSStaticMethods?.autoInit();
    }, 100);
});

const { current } = useRoute();

const isMessages = computed(() =>
    current?.value?.split(".").includes("messages"),
);
</script>

<template>
    <body
        class="min-h-fit bg-white dark:bg-gray-700 w-screen flex items-center justify-center"
    >
        <main class="h-full w-full self-center max-h-[1400px] max-w-[1000px]">
            <div class="relative w-full">
                <div
                    clas
                    class="sticky pb-4 top-0 bg-white z-10 w-full place-content-center"
                >
                    <div class="block h-10 top-0 w-full z-50">
                        <slot name="head" />
                    </div>
                    <div
                        class="flex gap-10 w-fit text-lg relative place-self-center"
                    >
                        <router-link
                            :href="route('home.agents.dashboard.index')"
                            class="py-2 relative rounded focus:outline-none"
                            :class="
                                !isMessages ? 'font-bold  text-primary-600' : ''
                            "
                        >
                            Dashboard
                            <div
                                class="bg-primary-500 h-[3px] right-0 transition-all duration-500 absolute bottom-0"
                                :class="[
                                    !isMessages ? 'w-full' : 'w-0 delay-200 ',
                                ]"
                            />
                        </router-link>

                        <router-link
                            :href="route('home.agents.messages')"
                            class="py-2 rounded focus:outline-none relative"
                            :class="
                                isMessages ? 'font-bold  text-primary-600' : ''
                            "
                        >
                            Messages
                            <div
                                class="bg-primary-500 h-[3px] transition-all duration-500 absolute bottom-0"
                                :class="[
                                    isMessages ? 'w-full' : 'w-0 delay-200 ',
                                ]"
                            />
                        </router-link>
                    </div>
                </div>
                <div class="sticky top-40">
                    <transition name="fade" mode="out-in">
                        <slot />
                    </transition>
                </div>
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
