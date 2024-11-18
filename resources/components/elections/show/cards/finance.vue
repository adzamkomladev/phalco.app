<script setup lang="ts"></script>

<template>
    <SharedCommonCard
        class="col-span-4 gap-2 flex flex-col relative p-[8%] py-10"
    >
        <div class="grid grid-cols-5 gap-2 _xs:flex flex-col">
            <div class="flex gap-2 col-span-2 _xs:flex-col">
                <p
                    class="rounded-full bg-primary-500 size-fit aspect-square p-2 flex items-center justify-center"
                >
                    <SharedCommonIcon name="logo" class="text-white h-5" />
                </p>
                <div class="font-bold">
                    <p>Phalco</p>
                    <p class="font-normal">Total Balance</p>
                    <p class="text-xl">88,000 USD</p>
                </div>
            </div>
            <div class="flex flex-col justify-end col-span-3">
                <p class="">
                    Total Donations :<span class="font-bold text-semibase ml-2"
                        >5,653 <span class="text-sm">GHC</span></span
                    >
                </p>
                <p>
                    Total Spent :<span class="font-bold text-semibase ml-2"
                        >5,653 GHC</span
                    >
                </p>
            </div>
            <div
                class="absolute top-5 right-5 p-1 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 group"
            >
                <SharedCommonIcon
                    name="chevron"
                    class="rotate-90 dark:text-gray-400 size-6 group-hover:translate-x-1 transition-all duration-300 group-hover:text-primary-300 dark:group-hover:text-primary-500"
                />
            </div>
        </div>
        <div class="h-full mt-20 mb-10">
            <SharedChartBar
                class="min-h-full"
                :values="[50, 75, 100, 150, 125, 34, 45, 243, 57, 23, 45, 231]"
                :labels="[
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec',
                ]"
            />
        </div>
    </SharedCommonCard>
</template>
