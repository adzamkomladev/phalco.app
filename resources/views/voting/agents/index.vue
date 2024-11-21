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
                    Agents
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Manage all Agents of an election
                </p>
            </div>

            <div class="gap-x-2 ml-auto place-self-end w-fit">
                <router-link
                    :href="route('voting.agents.create')"
                    class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-primary-400 border border-transparent rounded-lg cursor-pointer gap-x-2 hover:bg-primary-500 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                >
                    <svg
                        class="flex-shrink-0 size-3"
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                    >
                        <path
                            d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                        />
                    </svg>
                    Add New
                </router-link>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-7 _md:flex flex-col gap-4 sm:gap-6">
        <div class="col-span-4 _md">
            <VotingAgentsTable :table="table" />
        </div>
        <div class="col-span-3 grid gap-5">
            <div class="col-span-full grid grid-cols-2 gap-4">
                <VotingAgentsStatsCard
                    :value="134"
                    :description="'Total Agents'"
                />
                <VotingAgentsStatsCard
                    :value="134"
                    :description="'Total Agents'"
                />
                <VotingAgentsStatsCard
                    :value="134"
                    :description="'Total Agents'"
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
</template>
