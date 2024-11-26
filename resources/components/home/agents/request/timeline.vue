<script setup lang="ts"></script>
<template>
    <SharedCommonCard class="sm:w-[80%] place-self-center">
        <div class="">
            <p class="text-base mobile:text-sm font-semibold">Presidential</p>
            <p class="text-black/50 text-xs">Lorem ipsum dolor sit amet</p>
        </div>

        <div class="sm:flex">
            <HomeAgentsRequestTimelineItem
                v-for="l in 3"
                :key="l"
                :index="l - 1"
                :length="3"
            />
        </div>
    </SharedCommonCard>
</template>
