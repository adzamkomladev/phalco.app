<script setup lang="ts">
import { Agent } from "~/resources/interfaces/voting/agents/index.interface";

useHead({
    title: "Voting: Agents",
});

const props = defineProps<{
    stats: { value: number; description: string }[];
    agents: Table<{
        id: number;
        name: string;
        polling_stations: number;
        added_on: string;
    }>;
}>();

const table = useTable(props, "agents");

const selectedAgent = ref<Agent | null>(null);
</script>

<template layout="main">
    <div
        class="max-w-[85rem] px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <div class=" ">
            <div>
                <h2
                    class="text-xl font-semibold text-gray-800 dark:text-gray-200"
                >
                    Agents {{selectedAgent}}
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 pb-5">
                    Manage all Agents of in the election
                </p>
            </div>
        </div>

        <div class="grid grid-cols-7 _md:flex flex-col gap-4 sm:gap-6">
            <div class="col-span-4 _md">
                <VotingAgentsTable
                    :table="table"
                    @select-agent="selectedAgent = $event"
                />
            </div>
            <div class="col-span-3 grid gap-5">
                <div class="col-span-full grid grid-cols-2 gap-4">
                    <VotingAgentsStatsCard
                        v-for="(stat, index) in stats"
                        :key="index"
                        :value="stat.value"
                        :description="stat.description"
                    />
                </div>
                <div class="col-span-full">
                    <VotingAgentsDetailCard
                        v-if="selectedAgent"
                        :agent="selectedAgent"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
