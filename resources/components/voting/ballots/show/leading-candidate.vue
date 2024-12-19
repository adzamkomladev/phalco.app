<script setup lang="ts">
import BallotStatImage from "~/resources/svg/voting/ballot_stat.svg?src";


import { Option } from "~/resources/interfaces/voting/ballots/show.interface";

defineProps<{ candidate: Option | null; position: string }>();
</script>

<template>
    <SharedCommonCard
        class="font-medium h-full grid mobile_:_sm:py-10 text-center gap-4 shadow-card _sm:shadow _sm:p-5 rounded-2xl"
    >
        <p class="text-gray-800 font-semibold text-md">Leading Candidate</p>
        <div 
        class="grid mobile_:_sm:grid-cols-2 gap-4">
            <div class="grid place-items-center">
                <img
                    :src="candidate?.avatar || "
                    class="w-[35%] min-w-10 max-w-28 rounded-full border aspect-square"
                />
                <div class="flex items-center gap-2 bg-green-200">
                   <img
                    :src="candidate?.party_image"
                    class="w-[35%] min-w-10 max-w-28 max-h-24 "
                />
                <p>{{candidate?.party}}</p>
                </div>
                <p class="text-base font-medium">{{ candidate?.name }}</p>
                <p class="text-xs text-gray-800/50">{{ position }} Candidate</p>
            </div>
            <div class="">
                <p class="font-black text-3xl">{{ candidate?.votes }}</p>
                <span class="text-sm font-normal">votes</span>
                <img :src="BallotImage" class="place-self-center" />
            </div>
        </div>
    </SharedCommonCard>
</template>
