<script setup lang="ts">
import { PopularPollingStationsCardProps } from "~/resources/interfaces/voting/polling-stations/index.interface";

defineProps<PopularPollingStationsCardProps>();
</script>

<template>
    <SharedCommonCard
        class="font-medium p-auto gap-4 flex flex-col justify-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
    >
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Popular Polling Station
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Polling Stations with most votes
            </p>
        </div>
        <div>
            <VotingPollingStationsIndexVoteProgress
                v-for="(pollingStation, index) in pollingStations"
                :key="index"
                :index="index"
                :title="pollingStation.name"
                :total="pollingStation.votes"
                :progress="pollingStation.votes"
            />
        </div>
    </SharedCommonCard>
</template>
