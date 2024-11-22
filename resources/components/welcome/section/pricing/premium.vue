<script setup lang="ts">
import { PricingCardProps } from "~/resources/interfaces/welcome/index.interface";
import PremiumImage from "~/resources/svg/welcome/premium.webp?url";

const props = defineProps<PricingCardProps>();
</script>

<template>
    <div
        v-motion-pop-visible-once
        :duration="360"
        :delay="200"
        class="flex  pb-16 relative sm:col-span-4 flex-col p-6 text-left  border border-inherit rounded-xl shadow-gray-500 "
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
            class="mb-8  grid grid-rows-4   sm:grid-flow-col gap-4 text-left sm:grid-cols-5"
        >
            <li
                v-for="(offer, index) in data.offers"
                :key="index"
                :offer="offer"
                class="flex text-xs items-center col-span-2  space-x-3"
            >
                <div>
                    <SharedCommonIcon :size="10" name="check" />
                </div>

                <span class="text-thin">{{ offer }}</span>
            </li>

        
        </ul>

        <a
            href="#"
            class="w-48 hover:bg-opacity-90 bg-white text-primary-500 focus:ring-4 focus:ring-gray-200 font-bold rounded-lg text-sm px-10 py-2.5 text-center  dark:focus:ring-primary-900"
            :class="buttonClass"
        >
            Purchase</a
        >
        <div class="absolute h-full right-0   _sm:top-20  ">
        <img :src="PremiumImage" class="h-full _sm:h-2/3 _xs:max-h-72" />
</div>
    </div>
</template>
