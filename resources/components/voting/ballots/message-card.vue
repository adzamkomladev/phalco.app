<script setup lang="ts">
import BallotImage from "~/resources/images/voting/ballot_index.png?src";

const props = withDefaults(defineProps<{ message?: string }>(), {
    message: "It's not the voting that's democracy; it's the counting.",
});
</script>

<template>
    <SharedCommonCard
        class="font-medium p-auto h-full flex items-center shadow-card _sm:shadow _sm:p-5 rounded-2xl"
    >
        <div class="basis-1/2 min-w-[35%]">
            <img :src="BallotImage" />
        </div>
        <div>
            <p class="font-black text-2xl _lg:text-xl text-gray-800">
                Message from Phalco
            </p>

            <p class="text-gray-500">{{ message }}</p>
        </div>
    </SharedCommonCard>
</template>
