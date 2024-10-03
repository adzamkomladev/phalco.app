<script setup lang="ts">
onMounted(() => {
    setTimeout(() => {
        window.HSStaticMethods.autoInit();
    }, 100);
});
</script>

<template>
    <main class="flex p-6 bg-gray-100 sm:bg-white dark:bg-gray-800 selec">
        <section class="w-full min-h-[calc(100vh-48px)] flex flex-col sm:gap-[5vw] sm:flex-row ">
            <div
                class="bg-gray-100 sm:w-[50%] relative p-5 rounded-t-2xl sm:rounded-2xl h-full dark:bg-gray-700 flex"
            >
                <div class="absolute left:2 top-2 sm:left-5 sm:top-5">
                    <img class='sm:h-8' src="../../public/imgs/phalco_logo.svg" />
                </div>
                <div class="self-end">
                    <img src="../../public/imgs/auth.svg" />
                </div>
            </div>
            <div class="sm:pt-10 sm:px-0 md:pr-20  flex-1">
                    <slot />
            </div>
        </section>
    </main>
</template>
