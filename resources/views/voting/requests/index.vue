<script setup lang="ts">
useHead({
    title: "Voting: Vote Entry Requests",
});

const props = defineProps<{
    submitted: any[];
    pending: any[];
}>();

const pollingStationId = useProperty("elections.agentPollingStation.id");
const electionId = useProperty("elections.selected.id");
</script>

<template layout="main">
    <p>Requests</p>
    <div>
        <h3 class="h3">Submitted</h3>
        <template v-if="props?.submitted?.length > 0">
            <ul
                class="max-w-xs flex flex-col divide-y divide-gray-200 dark:divide-neutral-700"
            >
                <li
                    class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium text-gray-800 dark:text-white"
                    v-for="(submitted, index) in props.submitted"
                    :key="index"
                >
                    <p>{{ submitted.ballot.position }}</p>
                    <p>{{ submitted.ballot.description }}</p>
                    <p>{{ submitted.status }}</p>
                    <router-link
                        :href="
                            route('voting.requests.show', { id: submitted.id })
                        "
                    >
                        Details
                    </router-link>
                </li>
            </ul>
        </template>
        <template v-else>
            <p>No submitted requests</p>
        </template>
    </div>
    <div>
        <h3 class="h3">Pending</h3>
        <template v-if="props?.pending?.length > 0">
            <ul
                class="max-w-xs flex flex-col divide-y divide-gray-200 dark:divide-neutral-700"
            >
                <li
                    class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium text-gray-800 dark:text-white"
                    v-for="(pending, index) in props.pending"
                    :key="index"
                >
                    <p>{{ pending.position }}</p>
                    <p>{{ pending.description }}</p>
                    <router-link
                        :href="
                            route('voting.requests.create', {
                                ballot_id: pending.id,
                                polling_station_id: pollingStationId,
                                election_id: electionId,
                            })
                        "
                    >
                        Create Vote Entry Request
                    </router-link>
                </li>
            </ul>
        </template>
        <template v-else>
            <p>No pending requests</p>
        </template>
    </div>
</template>
