<script setup lang="ts">
useHead({
    title: "Voting: Ballots",
});

const props = defineProps<{
    ballots: Table<{
        id: number;
    }>;
}>();

const table = useTable(props, "ballots");
</script>

<template layout="main">
    <div>
        <!-- <SettingsTeamStats :stats="stats" /> -->
        <VotingBallotsTable :table="table" />
    </div>
</template>
