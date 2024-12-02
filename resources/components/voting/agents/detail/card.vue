<script setup lang="ts">
import { StatsCardProps } from "~/resources/interfaces/shared/common.interface";

const props = withDefaults(defineProps<StatsCardProps>(), {
    icon: "campaign_menu",
    value: "120",
    description: "",
});

const AgentData = [
    {
        label: "Agent A",
        value: 25,
        color: "#00B4D8",
    },
    {
        label: "Agent B",
        value: 35,
        color: "#0077B6",
    },
    {
        label: "Agent C",
        value: 40,
        color: "#03045E",
    },
];
</script>

<template>
    <SharedCommonCard
        class="font-medium p-[8%] flex flex-col justify-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
    >
        <div class="">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Agent Statistics
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Browser market shares at a specific website, 2014
            </p>
        </div>
        <div class="grid">
            <div
                class="flex justify-between _xs:flex-col py-10 md:px-0 sm:px-20 _sm:px-5"
            >
                <div
                    class="flex gap-2 items-center text-xs _lg:md:flex-col"
                    v-for="(agent, index) in AgentData"
                    :key="index"
                >
                    <span
                        class="w-6 rounded-full h-3 block"
                        :style="{ background: agent.color }"
                    />
                    <p>Ongoing</p>
                </div>
            </div>

            <div class="w-full max-w-72 place-self-center md:my-10">
                <SharedChartPie :data="AgentData" />
            </div>
        </div>
        <div class="flex justify-between">
            <div class="py-3 ps-6 lg:ps-3 pe-6 flex items-center gap-x-3">
                <img
                    class="inline-block size-[38px] rounded-full"
                    :src="'https://picsum.photos/300'"
                    alt="Logo"
                />
                <div class="grow">
                    <span
                        class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                    >
                        Komla Adzam
                    </span>
                    <span class="block text-sm text-gray-500"> Agent </span>
                </div>
            </div>

            <router-link
                class="text-xs text-nowrap px-4 py-1 text-gray-400 border border-gray-300 h-full rounded-md"
            >
                View Profile
            </router-link>
        </div>
    </SharedCommonCard>
</template>
