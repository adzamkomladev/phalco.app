<script setup lang="ts">
useHead({
    title: "Settings: Team",
});

const props = defineProps<{
    members: Table<{
        id: number;
    }>;
}>();

const table = useTable(props, "members");
</script>

<template layout="main">
    <div>
        <SettingsTeamStats />
        <SettingsTeamMembersTable :table="table" />
    </div>
</template>
