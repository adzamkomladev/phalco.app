<script setup lang="ts">
const props = defineProps<{
    message?: string; // Optional because it has a default
}>();

// If no message is passed, we assign the default here
const message = props.message || "new stuffs";
</script>

<template>
    <p>some contents {{ message }}</p>
</template>
