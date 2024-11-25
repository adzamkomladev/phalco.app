<script setup lang="ts">
onMounted(() => {
    setTimeout(() => {
        window.HSStaticMethods?.autoInit();
    }, 100);
});

const { current } = useRoute();

const isDashboard = computed(() => current?.value === "agent.dashboard");
const isMessages = computed(() => current?.value === "agent.message");
</script>

<template>
    <body class="bg-white h-full">
        <main class="flex flex-col">
            <div class="">
                <div
                    clas
                    class="sticky pb-4 pt-4 top-0 bg-white z-10 w-full place-content-center"
                >
                    <div
                        class="flex gap-10 w-fit text-lg relative place-self-center"
                    >
                        <router-link
                            href="dashboard"
                            class="py-2 rounded focus:outline-none"
                            :class="
                                isDashboard ? 'font-bold text-primary-600' : ''
                            "
                        >
                            Dashboard
                        </router-link>

                        <router-link
                            href="message"
                            class="py-2 rounded focus:outline-none"
                            :class="
                                isMessages ? 'font-bold text-primary-600' : ''
                            "
                        >
                            Messages
                        </router-link>

                        <div
                            class="bg-primary-500 h-[3px] transition-all duration-500 absolute w-[calc(50%)] bottom-0"
                            :style="{ right: isDashboard ? '50%' : '0' }"
                        />
                    </div>
                </div>

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
