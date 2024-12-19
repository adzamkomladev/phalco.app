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
}>();

const table = useTable(props, "audiences");
</script>

<template layout="main">
    <div class="grid gap-4">
         <div class="grid gap-4 grid-cols-2 md:grid-cols-4 ">
                <AudiencesIndexStatsCard
                    v-for="(stat, index) in 4"
                    :key="index"
              
                />
            </div>
        <!-- <SettingsTeamStats :stats="stats" /> -->
        <AudiencesIndexTable :table="table" />
    </div>
</template>
