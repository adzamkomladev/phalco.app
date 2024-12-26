<script setup lang="ts">
useHead({
    title: "Audiences",
});

const props = defineProps<{
    audiences: Table<{
        id: number;
        name: string;
        status: string;
        description?: string;
        total_contacts: number;
        created_at: string;
    }>;
    stats: App.Data.MiniCardStatData[];
}>();

const table = useTable(props, "audiences");
</script>

<template layout="main">
    <div>
        <!-- <SettingsTeamStats :stats="stats" /> -->
        <AudiencesIndexTable :table="table" />
    </div>
</template>
