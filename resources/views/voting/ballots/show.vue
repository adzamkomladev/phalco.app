<script setup lang="ts">
useHead({
    title: "Voting: Ballot Details",
});
const props = defineProps<{
    ballot: any;
}>();
</script>

<template layout="main">
    <p>Ballot details</p>
    <pre>{{ props.ballot }}</pre>
</template>
