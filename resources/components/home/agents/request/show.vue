<script setup lang="ts"></script>

<template>
    <div class="px-5 grid gap-4">
        <sharedCommonCard class="flex justify-between items-center">
            <div class="">
                <p class="text-lg mobile:text-sm font-semibold">Presidential</p>
                <p class="text-black/50 text-xs">Lorem ipsum dolor sit amet</p>
            </div>
            <div class="">
                <SharedTableRequestStatus
                    status="Accepted"
                    class="mobile:scale-75"
                />
            </div>
        </sharedCommonCard>

        <HomeAgentsRequestTimeline />

        <div class="">
            <p class="text-base mobile:text-sm font-semibold">Feed back</p>
            <p class="text-black/50 text-xs">Lorem ipsum dolor sit amet</p>
        </div>
    </div>
</template>
