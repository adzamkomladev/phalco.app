<script setup lang="ts">
import CampaignImage from "~/resources/images/election/campaign.png?src";
</script>

<template>
    <SharedCommonCard class="gap-8 shrink-0 col-span-3 flex flex-col py-10">
        <div class="font-semibold text-lg text-center">
            13 Sep- 25 Sep, 2024
        </div>
        <div class="text-center">
            <h2 class="text-lg font-medium text-gray-800 dark:text-gray-200">
                Election Details
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit, amet consectetur
            </p>
        </div>
        <div class="flex flex-col gap-5">
            <SharedCommonProgressBar
                title="Nomination Progress"
                :progress="47"
                :total="200"
                width="75%"
                height="16px"
            />
            <div class="text-gray-500 flex gap-4 items-center text-xs">
                <span class="size-3 bg-secondary-300 block" /><span
                    >Successfull Nominations :<span class="text-gray-700"
                        >120</span
                    ></span
                >
            </div>
        </div>

        <div class="flex flex-col justify-around h-full">
            <div class="flex gap-5">
                <span class="rounded-md bg-slate-100 p-1">
                    <sharedCommonIcon name="users" />
                </span>
                <div>
                    <p class="font-semibold text-lg">Total nominees</p>
                    <p class="font-medium text-base">145,078</p>
                </div>
            </div>
            <div class="flex gap-5">
                <span class="rounded-md bg-slate-100 p-1">
                    <sharedCommonIcon name="users" />
                </span>
                <div>
                    <p class="font-semibold text-lg">Total nominees</p>
                    <p class="font-medium text-base">145,078</p>
                </div>
            </div>
            <div class="flex gap-5">
                <span class="rounded-md bg-slate-100 p-1">
                    <sharedCommonIcon name="users" />
                </span>
                <div>
                    <p class="font-semibold text-lg">Total nominees</p>
                    <p class="font-medium text-base">145,078</p>
                </div>
            </div>
            <div class="flex gap-5">
                <span class="rounded-md bg-slate-100 p-1">
                    <sharedCommonIcon name="users" />
                </span>
                <div>
                    <p class="font-semibold text-lg">Total nominees</p>
                    <p class="font-medium text-base">145,078</p>
                </div>
            </div>
        </div>
    </SharedCommonCard>
</template>
