<script lang="ts" setup>
const props = withDefaults(defineProps<{}>(), {});
</script>

<template>
    <div>
        <div class="pb-2">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Ballot Option result
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Impedit, optio.
            </p>
        </div>

        <div class="gap-2 grid place-items-center">
            <div
                v-for="l in 5"
                :key="l"
                class="shadow-card dark:shadow-gray-800 bg-white dark:bg-gray-800 flex justify-between items-center relative overflow-hidden p-[2px] w-[95%] hover:w-full transition-all sm:place-self-center rounded-lg border-transparent border-animate"
            >
                <div
                    v-
                    class="animate-rotate absolute inset-0 h-full w-full rounded-full bg-[conic-gradient(#0ea5e9_20deg,transparent_120deg)]"
                ></div>

                <div
                    class="flex justify-between w-full z-10 bg-inherit h-full p-2 rounded-lg"
                >
                    <div class="flex items-center gap-x-3">
                        <img
                            class="inline-block size-[38px] rounded-full"
                            :src="'https://randomuser.me/api/portraits/men/1.jpg'"
                            alt="Logo"
                        />
                        <div class="grow">
                            <span
                                class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                            >
                                {{ "Komla Adzam" }}
                            </span>
                            <span class="block text-sm text-gray-500">
                                NPP
                            </span>
                        </div>
                    </div>

                    <div class="flex gap-4 mobile:gap-2">
                        <div class="flex gap-2 items-center">
                            <span
                                class="block text-sm mobile_:text-nowrap text-gray-500"
                            >
                                Total Vote
                            </span>
                            <span
                                class="block text-xl text-gray-800 font-semibold"
                            >
                                12,345
                            </span>
                        </div>

                        <spen
                            class="rounded-full size-10 aspect-square block bg-yellow-500"
                            >{{}}</spen
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
