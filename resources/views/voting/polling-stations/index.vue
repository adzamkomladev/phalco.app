<script setup lang="ts">
useHead({
    title: "Voting: Polling Stations",
});

const props = defineProps<{
    pollingStations: Table<{
        id: number;
    }>;
}>();

const table = useTable(props, "pollingStations");
</script>

<template layout="main">
    <div
        class="max-w-[85rem] gap-5 flex flex-col px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <!-- <SettingsTeamStats :stats="stats" /> -->

        <div class="md:grid grid-cols-2 flex flex-col gap-5">
            <div class="grid grid-cols-2 gap-4">
                <VotingPollingStationsStatsCard
                    class="Total"
                    description="polling station"
                    v-for="l in 4"
                    :key="l"
                />
            </div>

            <div>
                <VotingPollingStationsDetailCard />
            </div>
        </div>

        <VotingPollingStationsTable :table="table" />
    </div>
</template>
