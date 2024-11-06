<script setup lang="ts">
import { ElectionsStatsCardCompleteProps } from "~/resources/interfaces/elections/index.interface";

const props = defineProps<ElectionsStatsCardCompleteProps>();

const conicStyle = computed(() => ({
    background: `conic-gradient(
    from 270deg,
    #0988D0 0deg ${props.completionValue * 1.8}deg,
    transparent ${props.completionValue * 1.8}deg ${(props.completionValue + 2) * 1.8}deg,
    #BFDBFE ${(props.completionValue + 2) * 1.8}deg 180deg
  )`,
}));
</script>

<template>
    <div class="font-normal text-sm shadow-card _sm:shadow p-[8%] rounded-2xl">
        <div class="text-center">
            <div class="font-bold text-xl leading-">Onging Election</div>
            <div class="text-gray-500">
                Stats of current ongoing <br />
                elections
            </div>
        </div>
        <div class="pt-5 _sm:pt-2 flex justify-between">
            <div class="">
                <p class="text-lg font-bold relative w-fit">
                    {{ numberOfVoters }}
                    <sup
                        class="text-forest-300 left-full text-[0.6rem] absolute flex items-center"
                        ><SharedCommonIcon name="tri" class="h-2" />
                        <p>+5</p>
                    </sup>
                </p>
                <p class="text-gray-500">voters</p>
            </div>
            <div>
                <p class="text-lg font-semibold relative w-fit">
                    {{ daysLeft }}<span class="ml-2 text-sm">days</span>
                </p>
                <p class="text-gray-500">Days left</p>
            </div>
        </div>
        <div class="aspect-[2/1] overflow-hidden px-[10%]">
            <div
                :style="conicStyle"
                class="transition-all aspect-square mt-[13%] rounded-t-full flex justify-center w-full p-[5%] pb-0"
            >
                <div
                    class="aspect-[2/1] bg-white rounded-t-full w-full justify-center flex self-start"
                >
                    <div class="h-fit text-center self-end bottom-0">
                        <div class="font-bold text-3xl md:text-4xl xl:text-5xl">
                            {{ Number(completionValue.toFixed(2)) }}%
                        </div>
                        <div
                            class="text-secondary-300 text-xl sm:text-lg md:text-xl font-bold leading-none"
                        >
                            completed
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
