<script setup lang="ts">
import { StatsCardProps } from "~/resources/interfaces/shared/common.interface";

const props = withDefaults(defineProps<StatsCardProps>(), {
    value: "120",
    description: "",
});
</script>

<template>
    <SharedCommonCard
        class="font-medium p-auto h-fi max-h-32 flex flex-col justify-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
    >
        <p class="text-gray-500">{{ description }}</p>
        <p class="font-black text-2xl _lg:text-xl text-gray-800">{{ value }}</p>
    </SharedCommonCard>
</template>
