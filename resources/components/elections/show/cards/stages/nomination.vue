<script setup lang="ts">
import CampaignImage from "~/resources/images/election/campaign.png?src";
import { formatDate } from "~/resources/utils/shared/date";

import {
    Stage,
    StageStatsNominations
} from "~/resources/interfaces/elections/selected.interface";

const props =defineProps<{stageStat:StageStatsNominations,stage:Stage}>();

</script>

<template>
    <SharedCommonCard
        class="gap-5 shrink-0 col-span-4  flex flex-col"
    >
        <div class="font-semibold text-lg text-center">
                        <span>{{formatDate(new Date(stage.start),'dd-MMM')}}</span>  to <span>{{formatDate(new Date(stage.end),'dd-MMM-yyyy')}}</span>

        </div>
        <div class="text-center">
            <h2 class="text-lg font-medium text-gray-800 dark:text-gray-200">
                Nomination Details
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit, amet consectetur
            </p>
        </div>
        <div class="flex flex-col gap-5">
            <SharedCommonProgressBar
                title="Nomination Progress"
                :progress="stageStat.successful"
                :total="stageStat.total"
                width="75%"
                height="16px"
            />
            <div class="text-gray-500 flex gap-4 items-center text-xs">
                <span
                    class="size-3 bg-secondary-300 dark:bg-secondary-700 block"
                /><span
                    >Successfull Nominations :<span class="text-gray-700"
                        > {{stageStat.total}}</span
                    ></span
                >
            </div>
        </div>

        <div class="flex flex-col gap-5 justify-around h-full">
            <div class="flex gap-5">
                <span
                    class="rounded-md aspect-square bg-slate-100 size-10 dark:bg-gray-700 p-2"
                >
                    <sharedCommonIcon name="users" stroke-width="2" class="h-6" />
                </span>
                <div>
                    <p class="font-semibold text-lg">Total nominees</p>
                    <p class="font-medium dark:font-normal text-base">
                        {{stageStat.total}}
                    </p>
                </div>
            </div>
            <div class="flex gap-5">
                <span
                    class="rounded-md aspect-square bg-slate-100 size-10 dark:bg-gray-700 p-2"
                >
                    <sharedCommonIcon name="thumb_up" class="h-6" />
                </span>
                <div>
                    <p class="font-semibold text-lg">Total Approved nominees</p>
                    <p class="font-medium dark:font-normal text-base">
                        {{ stageStat.approved }}
                    </p>
                </div>
            </div>
            <div class="flex gap-5">
                <span
                    class="rounded-md aspect-square bg-slate-100 size-10 dark:bg-gray-700 p-2"
                >
                    <sharedCommonIcon name="thumb_up" class="h-6 rotate-180" />
                </span>
                <div>
                    <p class="font-semibold text-lg">Total Sucessfull</p>
                    <p class="font-medium dark:font-normal text-base">
                        {{stageStat.successful}}
                    </p>
                </div>
            </div>
            <div class="flex gap-5">
                <span
                    class="rounded-md aspect-square bg-slate-100 size-10 dark:bg-gray-700 p-2"
                >
                    <sharedCommonIcon name="pending" class="h-6" />
                </span>
                <div>
                    <p class="font-semibold text-lg">Total Pending</p>
                    <p class="font-medium dark:font-normal text-base">
                       {{stageStat.pending}}
                    </p>
                </div>
            </div>
        </div>
    </SharedCommonCard>
</template>
