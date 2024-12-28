<script setup lang="ts">
import Campaign from "~/resources/components/audiences/show/campaign.vue";

useHead({
    title: "SMS Campaign Details",
});


const props = defineProps<{
    requests:any;
    message:any;
    reports:any;
    timeline:any;
}>();

const table = useTable(props, "requests");
</script>

<template layout="main">
    <div
        class="max-w-[85rem] px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            SMS Campaign Details
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Make and organise your campaign on one click
        </p>

        <div class="grid gap-5 md:grid-cols-7">
            <div class="md:col-span-4 grid gap-5">
                <CampaignsSmsShowMessage />

        <div class="md:col-span-4 grid gap-5 ">
<CampaignsSmsShowMessage :message="message"/>

<CampaignsSmsShowReport :reports="reports"/>
</div>
<div class="md:col-span-3 ">
    <CampaignsSmsShowTimeline :timeline="timeline" />
</div>
<div class="col-span-full md:col-span-7">
    <CampaignsSmsTable :table="table" />

</div>
       </div>


    </div>
</template>
