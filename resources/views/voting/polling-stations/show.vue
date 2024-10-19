<script setup lang="ts">
useHead({
    title: "Voting: Polling Station Details",
});

const props = defineProps<{
    pollingStation: any;
}>();

const [voteEntryRequest] = props.pollingStation.vote_entry_requests;
</script>

<template layout="main">
    <p>Polling station details</p>
    <router-link
        v-if="voteEntryRequest"
        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
        :href="
            route('voting.polling-stations.show.request', {
                id: pollingStation.id,
                voteEntryRequestId: voteEntryRequest.id,
            })
        "
        >Review Vote Entry Request
    </router-link>
    <pre>{{ pollingStation }}</pre>
</template>
