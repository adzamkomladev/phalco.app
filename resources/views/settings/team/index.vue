<script setup lang="ts">
useHead({
    title: "Settings: Team",
});

const props = defineProps<{
    members: Table<{
        id: number;
    }>;
    stats: App.Data.Settings.Team.InvitationStatsData;
}>();

const table = useTable(props, "members");
</script>

<template layout="main">
    <div>
        <SettingsTeamStats :stats="stats" />
        <SettingsTeamMembersTable :table="table" />
    </div>
</template>
