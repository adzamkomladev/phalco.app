<script setup lang="ts">
import { StatsCardProps } from "~/resources/interfaces/shared/common.interface";
import AssignAgentImage from "~/resources/images/voting/assign_agent.png?src";

const props = defineProps<{ assignedAgent?: any }>();
</script>

<template>
    <SharedCommonCard
        class="font-medium p-[8%] place-self-center w-full flex flex-col min-w-fit gap-4 justify-evenly items-center h-full place-items-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
    >
        <div v-if="assignedAgent" class="rounded-full size-40 overflow-hidden">
            <img
                :src="assignedAgent.avatar"
                class="h-full w-auto aspect-square"
            />
        </div>
        <div v-else class="size-48 overflow-hidden">
            <img :src="AssignAgentImage" class="h-full w-auto aspect-square" />
        </div>

        <div class="text-center" v-if="assignedAgent">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                {{ assignedAgent.first_name }} {{ assignedAgent.last_name }}
            </h2>
            <p class="text-sm text-gray-600 font-normal dark:text-gray-400">
                Current Agent
            </p>
        </div>
        <router-link
            class="inline-flex items-center px-10 py-2 text-sm font-semibold text-white bg-primary-400 border border-transparent rounded-lg cursor-pointer rounded-md gap-x-2 hover:bg-primary-500 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
        >
            {{ assignedAgent ? " Switch Agent" : "Assign Agent" }}
        </router-link>
    </SharedCommonCard>
</template>