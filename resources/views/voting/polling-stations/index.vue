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
    <div>
        <!-- <SettingsTeamStats :stats="stats" /> -->
        <VotingPollingStationsTable :table="table" />
    </div>
</template>
