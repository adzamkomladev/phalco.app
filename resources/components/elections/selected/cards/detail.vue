<script setup lang="ts">
const props = defineProps<{}>();
</script>

<template>
    <SharedCommonCard
        class="divide-y dark:divide-gray-500 text-sm gap-2 shrink-0 max-w-[25rem] flex flex-col min-w-56"
    >
        <div class="flex justify-between items-center">
            <div class="flex gap-2 items-center">
                <span
                    class="bg-slate-100 dark:bg-slate-700 dark:text-primary-500 p-2 rounded-lg"
                >
                    <SharedCommonIcon
                        name="campaign_main"
                        stroke-width="2"
                        class="h-6"
                    />
                </span>
                <span class="font-semibold text-base">Voters</span>
            </div>
            <router-link
                class="p-1 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 group"
            >
                <SharedCommonIcon
                    name="chevron"
                    class="rotate-90 dark:text-gray-400 size-6 group-hover:translate-x-1 transition-all duration-300 group-hover:text-primary-300 dark:group-hover:text-primary-500"
                    stroke-width="1"
                />
            </router-link>
        </div>
        <div class="pt-5 _sm:pt-2 flex justify-between">
            <div class="">
                <p class="text-base font-bold relative w-fit">
                    120
                    <sup
                        class="text-forest-300 left-full text-[0.6rem] absolute flex items-center"
                        ><SharedCommonIcon name="tri" class="h-2" />
                        <p>+5</p>
                    </sup>
                </p>
                <p class="text-gray-500">voters</p>
            </div>
            <div>
                <p class="font-semibold relative w-fit">
                    68<span class="ml-2 text-sm">days</span>
                </p>
                <p class="text-gray-500">Days left</p>
            </div>
        </div>
    </SharedCommonCard>
</template>
