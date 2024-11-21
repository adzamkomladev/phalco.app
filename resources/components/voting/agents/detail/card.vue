<script setup lang="ts">
import { StatsCardProps } from "~/resources/interfaces/shared/common.interface";

const props = withDefaults(defineProps<StatsCardProps>(), {
    icon: "campaign_menu",
    value: "120",
    description: "",
});
</script>

<template>
    <SharedCommonCard
        class="font-medium p-auto h-fi max-h-32 flex flex-col justify-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
    >
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Agent Statistics
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Browser market shares at a specific website, 2014
            </p>
        </div>
        <div>
            <div class="flex justify-between">
                <div
                    class="flex gap-2 items-center text-xs"
                    v-for="l in 3"
                    :ky="l"
                >
                    <span class="w-6 rounded-full h-3 block bg-red-300" />
                    <p>Ongoing</p>
                </div>
            </div>
        </div>
    </SharedCommonCard>
</template>
