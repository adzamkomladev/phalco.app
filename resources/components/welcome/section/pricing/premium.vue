<script setup lang="ts">
import { PricingCardProps } from "~/resources/interfaces/landing/index.interface";

const props = defineProps<PricingCardProps>();
</script>

<template>
    <div
        v-motion-pop-visible-once
        :duration="360"
        class="flex pb-16 relative sm:col-span-4 flex-col p-6 text-left text-gray-900 border border-inherit rounded-xl shadow-gray-500 dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white"
    >
        <div class="flex items-baseline my-4">
            <span class="mr-2 text-4xl font-extrabold"
                >${{ data.amount.value }}</span
            >
            <span class=""
                ><span class="font-bold text-base">/</span
                >{{ data.amount.rate }}</span
            >
        </div>
        <p
            class="font-light pb-8 text-inherit text-gray-400 text-base dark:text-gray-400"
        >
            {{ data.description }}
        </p>
        <ul
            role="list"
            class="mb-8 grid grid-rows-4 grid-flow-col gap-4 text-left max grid-cols-3"
        >
            <WelcomeSectionPricingOffer
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
    </div>
</template>
