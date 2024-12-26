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
    <div class="grid gap-4">
        <div class="grid gap-4 grid-cols-2 md:grid-cols-4">
            <AudiencesIndexStatsCard
                :description="stat.title"
                :value="stat.value"
                v-for="(stat, index) in stats"
                :key="index"
            />
        </div>
        <AudiencesIndexTable :table="table" />
    </div>
</template>
