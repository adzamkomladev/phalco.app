<script setup lang="ts">
import LargeLogo from "../svg/large-logo.svg";

onMounted(() => {
    setTimeout(() => {
        window.HSStaticMethods.autoInit();
    }, 100);
});
</script>

<template>
    <main class="relative min-h-screen flex bg-white dark:bg-gray-800  sm:landscape:overflow-x-hidde">
        <section class="flex-1 flex flex-col sm:landscape:gap-x-[5vw] sm:landscape:landscape:flex-row">
            <!-- cover h not scroll does not affect -->
            <div
                class=" sticky h-[30vh]  -top-0 bg-cover block spect-square sm:landscape:h-full sm:landscape:landscape:w-[50%] rounded-t-2xl sm:landscape:rounded-tl-none sm:landscape:rounded-r-2xl dark:bg-gray-700 sm:landscape:flex"
            >
                <div class="blur-0 z-50 absolute left-2 top-8 sm:landscape:left-5 sm:landscape:top-5 ">
                    <img class="h-[1rem]  px-5 sm:h-[2rem] " :src="LargeLogo" />
                </div>
                <!-- <div class="">Register With Phalco and get new Experience Of Your Ploitical Carrier</div> -->
                

               
                <div class="bg-gray-200 shadow sticky bg-center  xl:landscape:bg-bottom bg-contain dark:bg-gray-700 blur-[1.5px] h-[50vh]  flex-1 bg-auth-p bg-no-repeat landscape:h-full  sm:landscape:blur-0">
                </div>
            </div>

            <!-- scrollable view -->
            <div
                class="sm:landscape:pt-10  -mt px-[8%] portrait:px-[14%] portrait:  sm:landscape:mt-0 pb-10 sm:landscape:px-0 sm:landscape:pr-[5vw] xl:pr-[8vw] z-50 bg-white rounded-t-[2.5rem] sm:landscape:rounded-t-none flex-1 sm:landscape:overflow-y-auto sm:landscape:h-screen dark:bg-gray-800"
            >
                <slot />

            </div>
        </section>
    </main>
</template>
