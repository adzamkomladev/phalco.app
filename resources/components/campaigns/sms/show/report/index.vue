<script setup lang="ts">
import NoCampaignReportsImage from "~/resources/svg/main/no_option.svg?src";


defineProps<{ reports: any }>();
</script>

<template>
    <SharedCommonCard class="space-y-4">

        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Campaign Report
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400"></p>
        </div>
        <div
        v-if="reports"
        class="grid gap-4 ">
<CampaignsSmsShowReportItem
:value="'200'"
:title="'Total Contacts'"
:icon="'users'"
/>
<CampaignsSmsShowReportItem
:value="'200'"
:title="'Delivered'"
:icon="'complete'"
/>
<CampaignsSmsShowReportItem
:value="'200'"
:title="'Undelivered'"
:icon="'close'"
/>
<CampaignsSmsShowReportItem
:value="'200'"
:title="'Time Taken'"
:icon="'clock'"
/>
        </div>
         <div v-else class="flex items-center  justify-evenly">
                        <p>No Info</p>

            <img class="h-24" :src="NoCampaignReportsImage" />
        </div>
    </SharedCommonCard>
</template>
