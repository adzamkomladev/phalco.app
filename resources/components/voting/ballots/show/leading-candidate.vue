<script setup lang="ts">
import BallotImage from "~/resources/svg/voting/ballot_stat.svg?src";

const props = withDefaults(defineProps<{ message: string }>(), {
    message: "election declaration will be blablabla blabababnananan ",
});
</script>

<template>
    <SharedCommonCard
        class="font-medium h-full g shadow-card _sm:shadow _sm:p-5 rounded-2xl"
    >
        <p class="text-gray-800 font-semibold text-md text-center">
            Leading Candidate
        </p>
        <div>
            <div class="grid place-items-center">
                <img
                    src=""
                    class="w-[35%] min-w-10 max-w-28 rounded-full border aspect-square"
                />

                <p class="text-base font-medium">Marvin Osei</p>
                <p class="text-xs text-gray-800/50">Presidential Candidate</p>
            </div>
            <div class="text-center">
                <p class="font-black text-3xl">46289</p>
                <span class="text-sm font-normal">votes</span>
                <img :src="BallotImage" class="place-self-center" />
            </div>
        </div>
    </SharedCommonCard>
</template>
