<script setup lang="ts">
defineProps<{ name: string; value: string | number }>();
</script>

<template>
    <SharedCommonCard
        class="font-medium p-auto flex flex-col justify-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
    >
        <p class="text-nowrap font-semibold text-gray-500">{{ name }}</p>
        <p class="font-black text-2xl _lg:text-xl text-gray-800">{{ value }}</p>
    </SharedCommonCard>
</template>
