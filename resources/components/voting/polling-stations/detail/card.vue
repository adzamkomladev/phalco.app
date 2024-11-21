<script setup lang="ts">
import { StatsCardProps } from "~/resources/interfaces/shared/common.interface";

const props = withDefaults(defineProps<StatsCardProps>(), {
    icon: "campaign_menu",
    value: "120",
    description: "",
});

const ballotsData = [
    {
        pollingStation: "Station 1",
        totalVoters: 250,
        votersVoted: 250,
    },
    {
        pollingStation: "Station 2",
        totalVoters: 300,
        votersVoted: 250,
    },
    {
        pollingStation: "Station 3",
        totalVoters: 400,
        votersVoted: 50,
    },
    {
        pollingStation: "Station 4",
        totalVoters: 150,
        votersVoted: 120,
    },
];
</script>

<template>
    <SharedCommonCard
        class="font-medium p-auto gap-4 flex flex-col justify-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
    >
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Popular Polling Station
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">consectetur</p>
        </div>
        <div>
            <VotingPollingStationsDetailVotePrgress
                v-for="(l, index) in ballotsData"
                :key="index"
                :index="index"
                :title="l.pollingStation"
                :total="l.totalVoters"
                :progress="l.votersVoted"
            />
        </div>
    </SharedCommonCard>
</template>
