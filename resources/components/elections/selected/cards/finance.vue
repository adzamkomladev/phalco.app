<script setup lang="ts">

</script>

<template>
     <SharedCommonCard class="col-span-4 gap-2 flex flex-col py-10">
            <div class="grid grid-cols-2 gap-2">
                <div class="flex gap-2">
                <p
                    class="rounded-full bg-primary-500 h-fit  aspect-square p-2 flex items-center justify-center"
                >
                    <SharedCommonIcon name="logo" class="text-white h-5" />
                </p>
                <div class="font-bold ">
                    <p>Phalco</p>
                    <p class="font-normal">Total Balance</p>
                    <p class="text-xl">88,000 USD</p>
                </div>
            </div>
            <div class="flex flex-col justify-end">
                <p>Total Donations :<span class="font-bold text-semibase">5,653 <span class="text-sm">GHC</span></span></p>
                <p>Total Spent :<span class="font-bold text-semibase">5,653 GHC</span></p>
            </div>
        </div>
            <div class="h-full mt-20 mb-10">
                <SharedChartBar
                class="min-h-full"
   :values="[50, 75, 100, 150, 125, 34, 45, 243, 57, 23, 45, 231]"
:labels="['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']"

                />
            </div>
            
        </SharedCommonCard>
</template>