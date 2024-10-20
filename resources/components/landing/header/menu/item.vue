<script setup lang="ts">
const props = defineProps<{ to: string }>();
</script>
<template>
    <a
        class="text-base text-black hover:opacity-90 font-bold capitalize md:py-4 focus:outline-none focus:text-neutral-300"
        :href="'#' + to"
        aria-current="page"
        >{{ to }}</a
    >
</template>
