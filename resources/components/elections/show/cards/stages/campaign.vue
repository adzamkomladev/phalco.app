<script setup lang="ts">
import CampaignImage from "~/resources/images/election/campaign.webp?src";

import {

    Stage,
    StageStatsCampaigns
} from "~/resources/interfaces/elections/selected.interface";

import { formatDate } from "~/resources/utils/shared/date";

const props =defineProps<{stageStat:StageStatsCampaigns,stage:Stage}>();
</script>

<template>
    <SharedCommonCard
        class="gap-2 shrink-0 dark:text-gray-400 flex flex-col col-span-4"
    >
        <div class="font-semibold text-lg text-center">
            <span>{{formatDate(new Date(stage.start),'dd-MMM')}}</span>  to <span>{{formatDate(new Date(stage.end),'dd-MMM-yyyy')}}</span>
        </div>
        <div class="text-center">
            <h2 class="text-lg font-medium text-gray-800 dark:text-gray-200">
                Campaigning Details
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit, amet consectetur
            </p>
        </div>

        <div class="flex flex-col gap-5 h-full">
            <div
                class="flex  text-white dark:text-gray-200 justify-between bg-secondary-300 dark:bg-primary-800 rounded-xl pr-2 p-5 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
            >
                <div class="flex flex-col justify-between">
                    <div class="flex items-center gap-2">
                        <img
                            class="inline-block size-16 rounded-full aspect-square"
                            :src="stageStat?.message?.sentBy?.avatar"
                        />
                        <span class="text-base">{{stageStat?.message?.sentBy?.name}}</span>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h1 class="text-lg font-medium">Campaign Message</h1>
                        <p
                            class=" text-xs font-light sm:_md:w-[120%] text-balan line-clamp-2 inli3 bg-inherit z-10"
                        >
                        {{stageStat?.message?.text}}

                        </p>

                    </div>
                    <button
                            class="border hover:bg-[#00000010] text-sm w-fit rounded-md p-2 border-secondary-200 dark:border-secondary-500 dark:text-primary-400"
                        >
                            View Message
                        </button>
                </div>
                <div class="basis-3/7 shrink-0 _xs:hidden ">
                    <img
                        class="inline-block rounded-full"
                        :src="CampaignImage"
                        alt="Avatar"
                    />
                </div>
            </div>

            <SharedCommonCard
                class="divide-y divide-gray-300 dark:divide-gray-600 grow text-sm gap-2 flex flex-col"
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
                            <p class="font-bold text-lg">Total Audiences</p>
                            <p class="font-semibold text-sm">{{stageStat?.audiences}}</p>
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
                            <p class="font-bold text-lg">Total Campaigns</p>
                            <p class="font-semibold text-sm">{{stageStat?.campaigns}}</p>
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
        </div>
    </SharedCommonCard>
</template>
