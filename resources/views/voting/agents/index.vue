<script setup lang="ts">
useHead({
    title: "Voting: Agents",
});

const props = defineProps<{
    agents: Table<{
        id: number;
    }>;
}>();

const table = useTable(props, "agents");

const TotalAgents: number = table.records.length;

const selectedAgent = ref(0);
const selectAgent = (id: number) => {
    console.log(id);
    selectedAgent.value = id
};
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
                    Manage all Agents of an electionm
                </p>
            </div>
        </div>

        <div class="grid grid-cols-7 _md:flex flex-col gap-4 sm:gap-6">
            <div class="col-span-4 _md">
                <VotingAgentsTable
                @on-select="selectAgent"
                :table="table" @select-agent="selectAgent" />
            </div>
            <div class="col-span-3 grid gap-5">
                <div class="col-span-full grid grid-cols-2 gap-4">
                    <VotingAgentsStatsCard
                        :value="134"
                        :description="'Total Agents'"
                    />
                    <VotingAgentsStatsCard
                        :value="135"
                        :description="'Total Agents'"
                    />
                    <VotingAgentsStatsCard
                        :value="134"
                        :description="'Total active Agents'"
                    />
                    <VotingAgentsStatsCard
                        :value="134"
                        :description="'Total Agents'"
                    />
                </div>
                <div class="col-span-full">
                    <VotingAgentsDetailCard />
                </div>
            </div>
        </div>
    </div>
</template>
