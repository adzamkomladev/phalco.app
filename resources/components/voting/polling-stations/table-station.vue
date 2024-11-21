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
        class="font-medium p-auto gap-4 flex flex-col justify-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
    >
        <div>
            <h2
                class="text-base font-semibold text-gray-800 dark:text-gray-200"
            >
                Tesano Gutters
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">consectetur</p>
        </div>
        <div>
            <div>
                <h2
                    class="text-base font-semibold text-gray-800 dark:text-gray-200"
                >
                    Tesano Gutters
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    consectetur
                </p>
            </div>
        </div>
    </SharedCommonCard>
</template>
