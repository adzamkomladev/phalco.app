<script setup lang="ts">
useHead({
    title: "Voting: New Vote Entry Requests",
});

const props = defineProps<{
    ballot: any;
}>();
</script>

<template>
    <SharedCommonOverlay title="New Vote Entry Requests" size="xl">
        <VotingRequestsFormsCreate :ballot="ballot" />
    </SharedCommonOverlay>
</template>
