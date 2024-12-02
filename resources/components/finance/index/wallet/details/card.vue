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
        class="font-medium p-auto flex flex-col justify-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
    >
        <p class="text-nowrap font-semibold text-gray-500">Total Balance</p>
        <p class="font-black text-2xl _lg:text-xl text-gray-800">$4,500</p>
    </SharedCommonCard>
</template>
