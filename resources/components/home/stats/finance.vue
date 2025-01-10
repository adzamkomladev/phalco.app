<script setup lang="ts">
import { StageStatsDefault } from "~/resources/interfaces/elections/show.interface";

const props = defineProps<{
    stageStat: StageStatsDefault;
    electionLogo: string;
}>();

const amountsSpent = Object.values(props.stageStat.spent) as number[];
const totalAmountSpent = computed(() => {
    return amountsSpent.reduce((sum, amount) => amount + sum, 0);
});

const unit = "₵";
</script>

<template>
    <SharedCommonCard class="gap-8 flex flex-col relative">
        <div class="text-center">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                Finance
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit, amet consectetur
            </p>
        </div>
        <div class="flex justify-evenly gap-4 _xs:flex-col _xl:md:flex-col">
            <div class="flex gap-2 col-span-2 _xs:flex-col">
                <img
                    :src="electionLogo"
                    class="rounded-full border size-14 aspect-square"
                />

                <div class="font-bold">
                    <p class="font-normal">Nominations</p>
                    <p class="text-xl">{{ stageStat.totalNominations }}</p>
                </div>
            </div>
            <div
                :class="[true ? 'w-fit  ' : '']"
                class="flex flex-col justify-e nd col-span-3"
            >
                <p class="">
                    Total Donations :<span class="font-bold text-semibase ml-2"
                        >{{ unit }} {{ stageStat.totalDonations || 0 }}
                    </span>
                </p>
                <p>
                    Total Spent :<span class="font-bold text-semibase ml-2"
                        >{{ unit }} {{ totalAmountSpent || 0 }}</span
                    >
                </p>
                <p>
                    Total Balance :<span class="font-bold text-semibase ml-2"
                        >{{ unit }} {{ stageStat.totalBalance || 0 }}</span
                    >
                </p>
            </div>
            <div
                class="absolute top-5 right-5 p-1 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 group"
            >
                <SharedCommonIcon
                    name="chevron"
                    class="rotate-90 dark:text-gray-400 size-6 group-hover:translate-x-1 transition-all duration-300 group-hover:text-primary-300 dark:group-hover:text-primary-500"
                />
            </div>
        </div>
        <div class="h-full mt-20 mb-10">
            <SharedChartBar
                class="min-h-full"
                :unit="unit"
                :values="Object.values(stageStat.spent || {})"
                :labels="Object.keys(stageStat.spent || {})"
            />
            <!--   -->
        </div>
    </SharedCommonCard>
</template>
