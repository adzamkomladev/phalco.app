<script setup lang="ts">
import { PricingCardProps } from "~/resources/interfaces/landing/index.interface";

const props = defineProps<PricingCardProps>();
</script>

<template>
    <div
        v-motion-pop-visible-once
        :duration="360"
        :delay="60 * position"
        class="flex pb-16 relative flex-col _sm:max-w-80 _md:max-w-96 p-6 mx-auto text-left text-gray-900 border border-inherit rounded-xl shadow-gray-500 dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white"
    >
        <h3 class="mb-4 text-2xl font-bold capitalize text-left">
            {{ data.type }}
        </h3>
        <p class="font-light text-inherit text-base dark:text-gray-400">
            {{ data.description }}
        </p>
        <div class="flex items-baseline my-4 border-b-2 pb-4 border-inherit">
            <span class="mr-2 text-4xl font-extrabold"
                >${{ data.amount.value }}</span
            >
            <span class=""
                ><span class="font-bold text-base">/</span
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

        <a
            href="#"
            class="w-48 hover:bg-opacity-90 focus:ring-4 focus:ring-gray-200 font-bold rounded-lg text-sm px-10 py-2.5 text-center dark:text-white dark:focus:ring-primary-900"
            :class="buttonClass"
        >
            Purchase</a
        >

        <div v-if="props.data.type === 'professional'">
            <LandingPricingListRatingProfessional />
        </div>
        <div v-if="props.data.type === 'premium'">
            <LandingPricingListRatingPremium />
        </div>
    </div>
</template>
