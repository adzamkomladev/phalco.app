<script setup lang="ts">
useHead({
    title: "Voting: Ballots",
});

const props = defineProps<{
    stats: { value: number; description: string }[];
    ballots: Table<{
        id: number;
    }>;
}>();

const table = useTable(props, "ballots");
</script>

<template layout="main">
    <div
        class="max-w-[85rem] px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            Election Ballots
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Manage all ballots and candidates
        </p>

        <div
            class="grid md:grid-cols-2 _md:flex-col py-5 gap-4 sm:gap-6 self-center"
        >
            <VotingBallotsLeadingCandidate />
            <div class="grid gap-4 sm:gap-6 grid-cols-2 _xs:grid-cols-1 grow">
                <VotingBallotsStatsCard
                    v-for="(stat, index) in stats"
                    :key="index"
                    :value="stat.value"
                    :description="stat.description"
                />
            </div>
        </div>

        <div class="transition-container">
            <div>
                <VotingBallotsTable :table="table" />
            </div>
        </div>
    </div>
</template>
