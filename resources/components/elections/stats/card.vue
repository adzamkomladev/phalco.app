<script setup lang="ts">
import ElectionsStatsProps from "~/resources/interfaces/elections/index.interface";

const props = defineProps<{ stats: ElectionsStatsProps }>();

const hasIncrease = true;
const creamentValue = computed(() => {
    return (stats.currentValue - prevValue) / stats.prevValue;
});
</script>

<template>
    <div
        class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800"
    >
        <div class="p-4 md:p-5 flex gap-x-4">
            <div
                class="shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-neutral-800"
            >
                <SharedCommonIcon :name="{{stats.icon}}" />
            </div>

            <div class="grow">
                <div class="flex items-center gap-x-2">
                    <p
                        class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500"
                    >
                        {{ stats.title }}
                    </p>
                    <div class="hs-tooltip" v-if="stats.toolkit">
                        <div class="hs-tooltip-toggle">
                            <SharedCommonIcon name="toolkit" />
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                role="tooltip"
                            >
                                {{ stats.toolkit }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mt-1 flex items-center gap-x-2">
                    <h3
                        class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200"
                    >
                        {{ stats.currentValue }}
                    </h3>
                    <span
                        class="inline-flex items-center gap-x-1 py-0.5 px-2 rounded-full bg-green-100 text-green-900 dark:bg-green-800 dark:text-green-100"
                    >
                        <SharedCommonIcon name="creament" />
                        <span class="inline-block text-xs font-medium">
                            12.5%
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>
