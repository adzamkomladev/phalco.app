<script setup lang="ts">
useHead({
    title: "Voting: Agent Details",
});

const props = defineProps<{
    agent: any;
}>();
</script>

<template layout="main">
    <p>Agent details</p>
    <pre>{{ props.agent }}</pre>
</template>
