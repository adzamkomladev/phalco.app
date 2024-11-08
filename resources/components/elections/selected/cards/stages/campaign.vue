<script setup lang="ts">
import CampaignImage from "~/resources/images/election/campaign.png?src";
</script>

<template>
    <SharedCommonCard
        class="gap-2 shrink-0 dark:text-gray-400 flex flex-col col-span-4"
    >
        <div class="font-semibold text-lg text-center">
            13 Sep- 25 Sep, 2024
        </div>
        <div class="text-center">
            <h2 class="text-lg font-medium text-gray-800 dark:text-gray-200">
                Campaign Details
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit, amet consectetur
            </p>
        </div>

        <div class="flex flex-col gap-5 h-full">
            <div
                class="flex text-white dark:text-gray-200 bg-secondary-300 dark:bg-primary-800 rounded-xl pr-2 p-5"
            >
                <div class="flex flex-col gap-">
                    <div class="flex items-center gap-2">
                        <img
                            class="inline-block size-16 rounded-full aspect-square"
                            src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                            alt="Avatar"
                        />
                        <span class="text-base">Komla Adzam</span>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h1 class="text-lg font-medium">Campaign Message</h1>
                        <p
                            class="inline-block text-xs font-light sm:_md:w-[120%] text-balan"
                        >
                            To start using Phalco, confirm your email address
                            with the email we sent to:
                        </p>
                        <button
                            class="border text-sm w-fit rounded-md p-2 border-secondary-200 dark:border-secondary-500 dark:text-primary-400"
                        >
                            View Message
                        </button>
                    </div>
                </div>
                <div class="basis-3/7 shrink-0 _xs:hidden">
                    <img
                        class="inline-block rounded-full"
                        :src="CampaignImage"
                        alt="Avatar"
                    />
                </div>
            </div>

            <SharedCommonCard
                class="divide-y dark:divide-gray-500 grow text-sm gap-2 flex flex-col"
            >
                <div class="flex justify-between items-center grow">
                    <div class="flex gap-4 items-center">
                        <span
                            class="bg-slate-100 dark:bg-slate-700 p-2 rounded-lg"
                        >
                            <SharedCommonIcon
                                name="users"
                                stroke-width="2"
                                class="h-6 dark:text-blue-500"
                            />
                        </span>
                        <div>
                            <p class="font-semibold text-base">
                                Total Supporters
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
                        <span
                            class="bg-slate-100 dark:bg-slate-700 p-2 rounded-lg"
                        >
                            <SharedCommonIcon
                                name="donation"
                                stroke-width="2"
                                class="h-6 dark:text-blue-500"
                            />
                        </span>
                        <div>
                            <p class="font-semibold text-base">
                                Total Donations
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
        </div>
    </SharedCommonCard>
</template>
