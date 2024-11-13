<script setup lang="ts">
import { ElectionsStatsCardSmallProps } from "~/resources/interfaces/elections/index.interface";

const props = withDefaults(defineProps<ElectionsStatsCardSmallProps>(), {
    icon: "campaign_menu",
    value: "120",
    description: "",
});
</script>

<template>
    <SharedCommonCard
        class="font-medium p-8 sm:_lg:p-6 flex flex-col justify-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
    >
        <div
            class="bg-gray-100 grow max-h-20 aspect-square dark:bg-gray-700 w-fit mb-2 p-3 rounded-lg"
        >
            <SharedCommonIcon
                :name="icon"
                class="rounded text-primary-500 size-full"
                stroke-width="1.5"
            />
        </div>
        <div>
            <div
                class="sm:whitespace-nowrap _xs:text-xs sm:_md:text-xs lg:text-sm  xl:text-xl 2xl:text-2xl font-semibold text-gray-800 dark:text-gray-200"
            >
                {{ description }}
            </div>
            <div class="text-gray-700 sm:text-xl dark:text-gray-400 font-semibold">
                {{ value }}
            </div>
        </div>

        <slot />
    </SharedCommonCard>
</template>
