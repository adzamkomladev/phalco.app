<script setup lang="ts">
useHead({
    title: "Voting: Vote Entry Request Details",
});

const props = defineProps<{
    voteEntryRequest: any;
}>();

</script>

<template>
    <SharedCommonOverlay title="Vote Entry Request Details" size="xl">
        <pre>{{ voteEntryRequest }}</pre>
    </SharedCommonOverlay>
</template>
