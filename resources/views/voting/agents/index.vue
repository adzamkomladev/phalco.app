<script setup lang="ts">
useHead({
    title: "Voting: Agents",
});

const props = defineProps<{
    agents: Table<{
        id: number;
    }>;
}>();

const table = useTable(props, "agents");

</script>

<template layout="main">
    <div>
        <!-- <SettingsTeamStats :stats="stats" /> -->
        <VotingAgentsTable :table="table" />
    </div>
</template>
