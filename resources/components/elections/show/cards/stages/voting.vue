<script lang="ts" setup>
import {
    Stage,
    StageStatsCampaigns,
    StageStatsVoting,
} from "~/resources/interfaces/elections/selected.interface";
import { formatDate, secondsUntil } from "~/resources/utils/shared/date";

const props = defineProps<{ stageStat: StageStatsVoting; stage: Stage }>();

const timeLeftToEndDate = Math.floor(secondsUntil(props.stage.end));
</script>

<template>
    <SharedCommonCard
        class="gap-2 shrink-0 dark:text-gray-400 flex flex-col col-span-4"
    >
        <div class="flex-col flex gap-2">
            <div class="font-semibold text-lg text-center">
                <span>{{ formatDate(new Date(stage.start), "dd - MMM") }}</span>
                to
                <span>{{
                    formatDate(new Date(stage.end), "dd - MMM , yyyy")
                }}</span>
            </div>
            <div class="text-center">
                <h2
                    class="text-lg font-semibold text-gray-800 dark:text-gray-200"
                >
                    Voting Details
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Lorem ipsum dolor sit, amet consectetur
                </p>
            </div>
        </div>

        <div class="flex flex-col gap-5 h-full">
            <div class="grid grid-cols-7 gap-[5%] _xs:gap-0">
                <div class="col-span-3 _xs:col-span-7 _xs:px-10">
                    <SharedChartPie :data="[{}]" />
                </div>
                <div
                    class="col-span-4 _xs:text-center _xs:col-span-7 flex flex-col text-xs sm:whitespace-nowrap p-2 pr-0 gap-4 justify-center"
                >
                    <div class="grid gap-4 grid-cols-2 xs:hidden">
                        <div>
                            <p class="text-gray-500">Total ballots</p>
                            <p class="font-bold text-sm">
                                {{ stageStat.ballots }}
                            </p>
                        </div>
                        <div>
                            <p class="text-gray-500">Total voters</p>
                            <p class="font-bold text-sm">
                                {{ stageStat.voters }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-500">Time Remaining</p>

                        <SharedCommonTimer
                            class="text-2xl md:text-3xl md:_xl:text-2xl font-bold"
                            :duration="timeLeftToEndDate"
                        />
                    </div>
                </div>
            </div>

            <SharedCommonCard
                class="divide-y h-60 divide-gray-300 dark:divide-gray-600 text-sm gap-2 flex flex-col"
            >
                <div class="flex justify-between items-center grow">
                    <div class="flex gap-4 items-center">
                        <span
                            class="bg-slate-100 dark:bg-gray-700 p-2 rounded-lg"
                        >
                            <SharedCommonIcon
                                name="users"
                                stroke-width="2"
                                class="h-6"
                            />
                        </span>
                        <div>
                            <p class="font-bold text-lg">Total Candidates</p>
                            <p class="font-semibold text-sm">
                                {{ stageStat.candidates }}8
                            </p>
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
                        <span
                            class="bg-slate-100 dark:bg-gray-700 p-2 rounded-lg"
                        >
                            <SharedCommonIcon
                                name="polling_station"
                                stroke-width="2"
                                class="h-6"
                            />
                        </span>
                        <div>
                            <p class="font-bold text-lg">
                                Total Polling Station
                            </p>
                            <p class="font-semibold text-sm">
                                {{ stageStat.pollingStations }}
                            </p>
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
            <router-link
                :href="route('voting.ballots.index')"
                class="text-center text-secondary-300"
            >
                Move to dashboard page
            </router-link>
        </div>
    </SharedCommonCard>
</template>
