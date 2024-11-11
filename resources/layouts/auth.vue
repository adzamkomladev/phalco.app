<script setup lang="ts">
onMounted(() => {
    setTimeout(() => {
        window.HSStaticMethods.autoInit();
    }, 100);
});
</script>

<template>
    <body
        class="bg-white dark:bg-gray-700 h-screen w-screen flex items-center justify-center"
    >
        <main
            class="relative flex-1 h-full shadow-lg w-full text-red-400 self-center max-h-[1400px] max-w-[1800px] flex bg-white dark:bg-gray-800 sm:landscape:overflow-hidden"
        >
            <section
                class="flex-1 flex flex-col sm:landscape:gap-x-[4%] sm:landscape:landscape:flex-row"
            >
                <div
                    class="sticky h-[30vh] sm:landscape:p-4 sm:landscape:pr-0 -top-0 bg-cover block spect-square sm:landscape:h-full sm:landscape:landscape:w-[50%] rounded-t-2xl sm:landscape:rounded-tl-none sm:landscape:rounded-r-2xl sm:landscape:flex"
                >
                    <div
                        class="blur-0 z-50 select-none absolute sm:left-[5vw] top-[2vh] p-5"
                    >
                        <div
                            class="h-[1rem] px-1 sm:h-[1.5rem] text-transparent bg-transparent xtall:sm:scale-150"
                        >
                            <SharedCommonIcon
                                name="logo_full"
                                class="text-primary-500"
                            />
                        </div>
                    </div>

                    <div
                        class="bg-[center_top_50%] bg-[length:90%] portrait:bg-[center_top_5rem] bg-gray-200 shadow sticky sm:landscape:rounded-3xl xtall:landscape:bg-[center] landscape:bg-[center_top_70%] _sm:bg-contain dark:bg-gray-700 blur-[1.5px] h-[50vh] flex-1 bg-auth-p bg-no-repeat sm:landscape:h-full sm:landscape:blur-0"
                    ></div>
                </div>

                <div
                    class="portrait:pt-8 landscape:pt-[5vh] -mt px-[10%] sm:portrait:px-[14%] sm:landscape:mt- pb-10 sm:landscape:px-0 sm:landscape:pr-[5vw] xl:pr-[8vw] z-10 bg-white rounded-t-[2.5rem] sm:landscape:rounded-t-none flex-1 sm:landscape:overflow-y-auto sm:landscape:h-screen dark:bg-gray-800"
                >
                    <transition name="fade" mode="out-in">
                        <slot />
                    </transition>
                </div>
            </section>
        </main>
    </body>
</template>
<style scoped>
main {
}

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
