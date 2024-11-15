<script setup lang="ts">
useHead({
    title: "Audience Details",
});

const props = defineProps<{
    audience: any;
}>();
</script>

<template layout="main">
    <p>Audience details</p>
    <pre>{{ audience }}</pre>
</template>
