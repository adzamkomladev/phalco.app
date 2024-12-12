<script setup lang="ts">
useHead({
    title: "Voting: Polling Station Details",
});

const props = defineProps<{
    pollingStation: any;
    voters: Table<{
        id: number;
    }>;
    requests: Table<{
        id: number;
    }>;
}>();
const votersTable = useTable(props, "voters");
const requestsTable = useTable(props, "requests");

const [voteEntryRequest] = props.pollingStation?.vote_entry_requests || [];
</script>

<template layout="main">
    <div
        class="max-w-[85rem] px-4 grid gap-4 sm:gap-6 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <div>
            <h2
                v-if="pollingStation"
                class="text-xl font-semibold text-gray-800 dark:text-gray-200"
            >
                <!-- {{ pollingStation.name}} ] -->
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Manage all Agents of an election
            </p>
        </div>

        <div
            class="grid grid-cols-7 _md:grid _md:grid-cols-1 flex-wrap gap-4 sm:gap-6"
        >
            <div class="col-span-4 grow">
                <VotingPollingStationsShowOptionTable :table="requestsTable" />
            </div>
            <div class="col-span-3">
                <VotingPollingStationsShowOptionAssignAgent
                    :assigned-agent="agent"
                />
            </div>
        </div>

        <div class="col-span-full _md">
            <VotingPollingStationsShowVotersTable :table="votersTable" />
        </div>
    </div>
</template>
<!--     <router-link
        v-if="voteEntryRequest"
        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
        :href="
            route('voting.polling-stations.show.request', {
                id: pollingStation.id,
                voteEntryRequestId: voteEntryRequest.id,
            })
        "
        >Review Vote Entry Request
    </router-link> -->
