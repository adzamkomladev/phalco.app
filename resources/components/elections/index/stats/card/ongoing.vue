<script setup lang="ts">
import NoOngoingElectionStats from "~/resources/svg/main/no_ongoing.svg?svg";

const props = defineProps<{
    stats: App.Data.Elections.Index.OngoingStatsData | null;
}>();

const completed = ref(props.stats?.completionPercentage || 0);
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
        <div v-if="stats">
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
        </div>
          <div
            v-else
            class="p-5 flex _xs:flex-row xs:_sm:flex-col gap-5  _sm:gap-0 _xl:md:gap-0 _xl:md:flex-col"
        >
            <img
                :src="NoOngoingElectionStats"
                class="w-[50%] _sm:w-[60%] _xl:md:w-[60%] max-h-96 place-self-center"
            />
            <p class="text-black/70 pt-4  capitalize place-self-center">
                no ongoing elction
            </p>
        </div>
    </SharedCommonCard>
</template>
