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
        class="font-medium aspect-[3.374/2.125] p-8 sm:_lg:p-6 flex flex-col justify-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
    >
        hddddddddddddddddsssssssssssssssssss
    </SharedCommonCard>
</template>
