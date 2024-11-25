<script setup lang="ts">
import { PopularPollingStation } from "~/resources/interfaces/voting/polling-stations/index.interface";

useHead({
    title: "Voting: Polling Stations",
});

const props = defineProps<{
    pollingStations: Table<{
        id: number;
        code: string;
        votes: string;
        name: string;
        status: string;
    }>;
    stats: {
        description: string;
        value: string;
    }[];
    popularPollingStations: PopularPollingStation[];
}>();

const table = useTable(props, "pollingStations");
</script>

<template layout="main">
    <div
        class="max-w-[85rem] gap-5 flex flex-col px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <div class="md:grid grid-cols-2 flex flex-col gap-5">
            <div class="grid grid-cols-2 gap-4">
                <VotingPollingStationsIndexStatsCard
                    class="Total"
                    v-for="(stat, index) in stats"
                    :description="stat.description"
                    :key="index"
                    :value="stat.value"
                />
            </div>

            <div>
                <VotingPollingStationsIndexPopularGraph
                    :polling-stations="popularPollingStations"
                />
            </div>
        </div>

        <VotingPollingStationsIndexTable :table="table" />
    </div>
</template>
