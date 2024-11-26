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
const loginIn = computed(() => current?.value?.split(".").includes("index"));
</script>

<template>
    <body
        class="min-h-fit bg-white dark:bg-gray-700 w-screen flex items-center justify-center"
    >
        <main class="h-full w-full self-center max-h-[1400px] max-w-[1000px]">
            <div class="relative w-full">
                <div
                    :class="[loginIn && 'pt-[84px]']"
                    class="sticky pb-4 top-0 bg-white z-10 w-full place-content-center flex flex-col gap-5"
                >
                    <nav
                        v-if="!loginIn"
                        class="px-4 sm:px-6 flex items-center w-full  mx-auto py-2 border-b h-16"
                    >
                        <div class="me-5 lg:me-0">
                            <!-- Logo -->
                            <router-link
                                class="flex-none rounded-md text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                                :href="route('home')"
                                aria-label="Phalco"
                            >
                                <SharedCommonIcon
                                    name="logo_full"
                                    class="text-primary-logo mobile:h-4"
                                />
                            </router-link>
                            <!-- End Logo -->
                        </div>

                        <div
                            class=" flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3"
                        >
                            <div
                                class="flex flex-row items-center justify-end gap-1"
                            >
                                <button
                                    type="button"
                                    class="size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                                >
                                    <SharedCommonIcon name="bell" />
                                    <span class="sr-only">Notifications</span>
                                </button>

                                <LayoutHomeAgentAccountNavDropdown />
                            </div>
                        </div>
                    </nav>
                    <div
                        class="flex gap-10 w-fit text-lg relative place-self-center"
                    >
                        <router-link
                            :href="route('home.agents.dashboard.index')"
                            class="py-2 relative rounded focus:outline-none"
                            :class="
                                !isMessages
                                    ? 'font-bold pointer-events-none text-primary-600'
                                    : ''
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
                                isMessages
                                    ? 'font-bold  pointer-events-none  text-primary-600'
                                    : ''
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
