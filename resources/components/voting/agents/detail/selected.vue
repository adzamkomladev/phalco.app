<script setup lang="ts">
import { Agent } from "~/resources/interfaces/voting/agents/index.interface";
import NoAgentSelectedImage from "~/resources/svg/main/no_agent_selected.svg?url";

const props = defineProps<{ agent: Agent |null }>();
</script>

<template>
    <SharedCommonCard
        class="gap-5 shrink-0 dark:text-gray-400 flex flex-col col-span-4"
    >
        <div class="text-center grid gap-5">
            <h2 class="text-lg text-gray-800 font-bold dark:text-gray-200">
                Agents Stats
            </h2>
            <div
                class="w-[70%] max-w-52  h-auto aspect-square block  shrink- rounded-full overflow-hidden place-self-center"
            >
                <img :src="agent?.avatar || NoAgentSelectedImage" class="w-full" />
            </div>
            <div>
                <p class="font-semibold">{{ agent?.name }}</p>
                <p class="text-gray-800/50">Current Agent</p>
            </div>
        </div>

        <SharedCommonCard
            class="divide-y divide-gray-300 dark:divide-gray-600 grow text-sm gap-2 flex flex-col"
        >
            <div class="flex justify-between items-center grow">
                <div class="flex gap-4 items-center">
                    <span class="bg-slate-100 dark:bg-gray-700 p-2 rounded-lg">
                        <SharedCommonIcon
                            name="users"
                            stroke-width="2"
                            class="h-6"
                        />
                    </span>
                    <div>
                        <p class="font-bold text-lg">Total Polling Stations</p>
                        <p class="font-semibold text-sm">
                            {{ agent?.pollingStations }}
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
                    <span class="bg-slate-100 dark:bg-gray-700 p-2 rounded-lg">
                        <SharedCommonIcon
                            name="polling_station"
                            stroke-width="2"
                            class="h-6"
                        />
                    </span>
                    <div>
                        <p class="font-bold text-lg">Pending Vote Requests</p>
                        <p class="font-semibold text-sm">
                            {{ agent?.voteRequests }}
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
    </SharedCommonCard>
</template>
