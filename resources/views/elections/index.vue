<script setup lang="ts">
useHead({
    title: "All Elections",
});

const props = defineProps<{
    stats: App.Data.Elections.Index.StatsData;
    electionsTable: Table<{
        id: number;
        name: string;
        status: string;
        current_stage: string;
        created_at: string;
    }>;
}>();



const table = useTable(props, "electionsTable");
</script>

<template layout="main">
    <!-- Card Section -->

    <div
        class="max-w-[90rem] gap-4 grid text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <!-- Grid -->

        <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 self-center _sm:px-[5%]">
            <!-- Card -->

            <ElectionsIndexStatsCardOngoing :stats="stats.ongoing" />

            <div class="flex flex-col gap-4 sm:gap-6">
                <!-- amount card -->
                <ElectionsIndexStatsCardSmall
                    icon="cedi"
                    description="Total amount spent on all elections"
                    :value="'₵' + stats.totalSpent"
                    class="grow"
                />

                <!-- amount card -->
                <ElectionsIndexStatsCardSmall
                    icon="campaign_main"
                    description="Total elections campaigns"
                    :value="stats.totalCampaigns + ''"
                    class="grow"
                >
                    <div class="absolute top-5 right-5">
                        <SharedCommonIcon
                            name="tri"
                            class="rounded text-forest-500 size-7"
                            stroke-width="2"
                        />
                    </div>
                </ElectionsIndexStatsCardSmall>
            </div>
        </div>
        <!-- End Grid -->
        <ElectionsIndexTable :table="table" />
    </div>
    <!-- End Card Section -->
    <!-- Table Section -->
</template>
