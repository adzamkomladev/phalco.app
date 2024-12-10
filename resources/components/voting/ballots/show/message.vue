<script setup lang="ts">
import BallotShowMessageImage from "~/resources/images/voting/ballot_show_message.png?src";

const props = withDefaults(defineProps<{ message?: string }>(), {
    message:
        "All voters and electoral personnel should always keep peace voters and electoral personnel should always keep peace voters and electoral personnel should always keep peace voters and electoral personnel should always keep peace ",
});
</script>

<template>
    <SharedCommonCard
        class="font-medium h-full grid mobile_:_sm:py-10 text-center gap-4 shadow-card _sm:shadow _sm:p-5 rounded-2xl"
    >
        <p class="text-gray-800 font-semibold text-base">Message from Phalco</p>
        <div class="grid gap-4">
            <div class="grid place-items-center">
                <img
                    :src="BallotShowMessageImage"
                    class="w-[50%] rounded-full h-auto"
                />
            </div>
            <div class="">
                <span class="text-sm font-normal">{{ message }}</span>
            </div>
        </div>
    </SharedCommonCard>
</template>
