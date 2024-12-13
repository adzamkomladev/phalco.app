<script setup lang="ts">
import { PopularPollingStationsCardProps } from "~/resources/interfaces/voting/polling-stations/index.interface";
import NoPopularPollingStationImage from '~/resources/svg/main/paper_in_box.svg?src'

defineProps<PopularPollingStationsCardProps>();
</script>

<template>
    <SharedCommonCard
        class="font-medium gap-4 flex flex-col shadow-card _sm:sadow _sm:p-5 rounded-2xl relative"
    >
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Popular Polling Station
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Polling Stations with most votes
            </p>
        </div>
        <div
        v-if="pollingStations"
        >
            <VotingPollingStationsIndexVoteProgress
                v-for="(pollingStation, index) in pollingStations"
                :key="index"
                :index="index"
                :title="pollingStation.name"
                :total="pollingStation.votes"
                :progress="pollingStation.votes"
            />
        </div>
         <div class="p-5" v-else>
                <img
                    :src="NoPopularPollingStationImage"
                    class="h-[50vh] max-h-96 place-self-center"
                />
                <p class="text-black/50 text-center pt-4">
                    no polling station added!
                </p>
            </div>
    </SharedCommonCard>
</template>
