<script setup lang="ts">
import { defaultElectionStages } from "~/resources/data/elections/create";
const chartData = [
    { label: "Result", value: 10 },
    { label: "Vetting", value: 15 },
    { label: "Nominations", value: 55 },
    { label: "Campaigning", value: 5 },
    { label: "Voting", value: 8 },
    { label: "Collation", value: 17 },
];
</script>

<template>
    <SharedCommonCard class="gap-2 shrink-0 col-span-4 flex flex-col gap-5">
        <div class="gap-2 flex flex-col">
            <div class="font-semibold text-lg text-center">
                13 Sep- 25 Sep, 2024
            </div>
            <div class="text-center">
                <h2
                    class="text-lg font-medium text-gray-800 dark:text-gray-200"
                >
                    Voting Details
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Lorem ipsum dolor sit, amet consectetur
                </p>
            </div>
        </div>

        <div class="flex flex-col gap-5 h-full">
            <div class="grid grid-cols-7">
                <div class="col-span-3">
                    <SharedChartPie :data="chartData" />
                </div>
                <div
                    class="col-span-4 flex flex-col text-xs sm:whitespace-nowrap p-2 pr-0 gap-4 justify-center"
                >
                    <div class="grid gap-4 grid-cols-2">
                        <div>
                            <p class="text-gray-500">Total ballots</p>
                            <p class="font-bold text-sm">4,327</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Total voters</p>
                            <p class="font-bold text-sm">4,327</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-500">Time Remaining</p>
                        <p class="font-bold text-lg sm:text-3xl">56:90:56</p>
                    </div>
                </div>
            </div>

            <SharedCommonCard class="divide-y grow text-sm gap-2 flex flex-col">
                <div class="flex justify-between items-center grow">
                    <div class="flex gap-4 items-center">
                        <span class="bg-slate-100 p-2 rounded-lg">
                            <SharedCommonIcon
                                name="users"
                                stroke-width="2"
                                class="h-6"
                            />
                        </span>
                        <div>
                            <p class="font-semibold text-base">
                                Total Candidates
                            </p>
                            <p class="font-semibold text-sm">145,078</p>
                        </div>
                    </div>
                    <div class="group">
                        <SharedCommonIcon
                            name="poles"
                            class="size-6"
                            stroke-width="1"
                        />
                    </div>
                </div>
                <div class="flex justify-between items-center grow pt-4">
                    <div class="flex gap-4 items-center">
                        <span class="bg-slate-100 p-2 rounded-lg">
                            <SharedCommonIcon
                                name="polling_station"
                                stroke-width="2"
                                class="h-6"
                            />
                        </span>
                        <div>
                            <p class="font-semibold text-base">
                                Total Polling Staton
                            </p>
                            <p class="font-semibold text-sm">15,576</p>
                        </div>
                    </div>
                    <div class="group">
                        <SharedCommonIcon
                            name="poles"
                            class="size-6"
                            stroke-width="1"
                        />
                    </div>
                </div>
            </SharedCommonCard>
            <router-link class="text-center text-secondary-300">
                Move to dashboard page
            </router-link>
        </div>
    </SharedCommonCard>
</template>
