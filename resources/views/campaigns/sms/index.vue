<script setup lang="ts">
useHead({
    title: "SMS Campaigns",
});

const props = defineProps<{
    campaigns: any;
    stats: any;
    notifications: any;
}>();

const table = useTable(props, "campaigns");
</script>

<template layout="main">
    <div
        class="max-w-[85rem] px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            Campaigns
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Make and organise your campaign on one click
        </p>

        <div
            class="flex md:grid md:grid-cols-5 _md:flex-col py-5 gap-4 sm:gap-6 self-center"
        >
            <div class="col-span-3">
                <CampaignsNotification
                    :notifications="notifications"
                    class=""
                />
            </div>

            <div class="grid gap-4 sm:gap-6 md:col-span-2 _md:grid-flow-col">
                <CampaignsStatsCard
                    v-for="(stat, index) in stats"
                    :key="index"
                    :value="stat.value"
                    :description="stat.title"
                />
            </div>
        </div>

        <div class="">
            <div>
                <CampaignsTable :table="table" />
            </div>
        </div>
    </div>
</template>
