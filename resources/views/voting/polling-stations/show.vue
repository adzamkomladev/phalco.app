<script setup lang="ts">
useHead({
    title: "Voting: Polling Station Details",
});

const props = defineProps<{
    pollingStation: any;
}>();
</script>

<template layout="main">
    <p>Polling station details</p>
        <pre>{{ props.pollingStation }}</pre>

</template>
