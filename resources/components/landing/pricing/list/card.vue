<script setup lang="ts">
const props = defineProps<{
    data: {
        type: string;
        amount: { value: number; rate: string };
        description: string;
        offers: string[];
    };
}>();
</script>

<template>
    <div
        class="flex pb-16 relative flex-col max-w-lg p-6 mx-auto text-left text-gray-900 border border-inherit rounded-xl shadow shadow-gray-500 dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white"
    >
        <h3 class="mb-4 text-2xl font-bold capitalize text-left">
            {{ data.type }}
        </h3>
        <p class="font-light text-inherit sm:text-lg dark:text-gray-400">
            {{ data.description }}
        </p>
        <div class="flex items-baseline my-4 border-b-2 pb-4 border-inherit">
            <span class="mr-2 text-4xl font-extrabold"
                >${{ data.amount.value }}</span
            >
            <span class=""
                ><span class="font-bold text-xl">/</span
                >{{ data.amount.rate }}</span
            >
        </div>

        <ul role="list" class="mb-8 space-y-4 text-left">
            <LandingPricingListItem
                v-for="(offer, index) in data.offers"
                :key="index"
                :offer="offer"
            />
        </ul>

        <slot name="button"></slot>

        <div v-if="props.data.type === 'professional'">
            <LandingPricingListRatingProfessional />
        </div>
        <div v-if="props.data.type === 'premium'">
            <LandingPricingListRatingPremium />
        </div>
    </div>
</template>
