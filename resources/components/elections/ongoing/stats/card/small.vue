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
        class="font-medium flex flex-col justify-center shadow-card _sm:shadow p-5 rounded-2xl relative"
    >
        <div class="bg-gray-100 dark:bg-gray-700 w-fit mb-2 p-3 rounded-lg">
            <SharedCommonIcon
                :name="icon"
                class="rounded text-primary-500 size-7"
                stroke-width="2"
            />
        </div>

        <div class="font-bold">{{ description }}</div>
        <div class="text-gray-700 dark:text-gray-400">{{ value }}</div>

        <slot />
    </SharedCommonCard>
</template>
