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
        <VotingRequestsFormsUpdateStatus
            v-if="voteEntryRequest.status === 'pending'"
            :vote-entry-request-id="voteEntryRequest.id"
        />
        <pre>{{ voteEntryRequest }}</pre>
    </SharedCommonOverlay>
</template>
