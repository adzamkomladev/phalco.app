<script setup lang="ts">
import { PricingCardProps } from "~/resources/interfaces/welcome/index.interface";

const props = defineProps<PricingCardProps>();
</script>

<template>
    <div
        v-motion-pop-visible-once
        :duration="360"
        class="flex pb-16 relative   h-fit _sm:w-full  sm:col-span-2 flex-col  p-6 mx-auto text-left text-gray-900 border border-inherit rounded-xl shadow-gray-500 dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white"
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
        <ul role="list" class="mb-8 space-y-4 text-left">
          <li 
                 v-for="(offer, index) in data.offers"
                :key="index"
                :offer="offer"
                class="flex text-xs items-center space-x-3">
        <div>
            <SharedCommonIcon :size="10" name="check" class="text-primary-500" />
        </div>

        <span class="text-thin">{{ offer }}</span>
    </li>
        </ul>

        <a
            href="#"
            class="w-48 bg-[#D1EEFF]  hover:bg-opacity-90  focus:ring-4 focus:ring-gray-200 font-bold rounded-lg text-sm px-10 py-2.5 text-center text-primary-500 dark:focus:ring-primary-900"
         
        >
            Purchase</a
        >
    </div>
</template>
