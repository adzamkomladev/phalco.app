<script setup lang="ts">
const props = defineProps<{
    stats: App.Data.Elections.Index.OngoingStatsData | null;
}>();

const completed = ref(props.stats?.completionPercentage || 10);
// const conicStyle = null;
</script>

<template>
    <SharedCommonCard class="font-normal text-sm p-[8%] rounded-2xl">
        <div class="text-center">
            <div
                class="text-2xl _sm:text-lg font-semibold text-gray-800 dark:text-gray-200"
            >
                Ongoing Election
            </div>
            <div class="text-gray-500">
                Stats of current ongoing <br />
                elections
            </div>
        </div>
        <div class="pt-5 _sm:pt-2 flex justify-between">
            <div class="">
                <p
                    class="text-2xl font-semibold text-gray-800 dark:text-gray-200 relative w-fit"
                >
                    {{ stats?.totalVoters || 0 }}
                    <sup
                        class="text-forest-300 left-full text-[0.6rem] absolute flex items-center"
                        ><SharedCommonIcon name="tri" class="h-2" />
                        <p>+{{ stats?.totalVotersChange || 0 }}</p>
                    </sup>
                </p>
                <p class="text-gray-500">voters</p>
            </div>
            <div>
                <p
                    class="text-2xl font-semibold text-gray-800 dark:text-gray-200 w-fit"
                >
                    {{ stats?.daysLeft }}<span class="ml-2 text-sm">days</span>
                </p>
                <p class="text-gray-500">Days left</p>
            </div>
        </div>
        <SharedChartGuage :completed="completed" />
    </SharedCommonCard>
</template>
