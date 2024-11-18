<script setup lang="ts">
import {
    Election,
    Stats,
} from "~/resources/interfaces/elections/selected.interface";

useHead({
    title: "Election Details",
});

const props = defineProps<{
    election: Election;
    stats: Stats;
}>();

// const { user } = useSecurity();

</script>

<template layout="main">
    <div
        class="max-w-[100rem] px-4 flex flex-col gap-8 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <div class="">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                Hey Komla
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit, amet consectetur
            </p>
        </div>

        <ElectionsShowCardsCreatedBy :by="election.created_by" />

        <div class="">
            <h2 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                Election Details
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit, amet consectetur
            </p>
        </div>

        <div
            class="grid md:grid-cols-2 _md:flex flex-col items-center px-auto xl:grid-cols-4 gap-4 sm:gap-6"
        >
           
            <ElectionsShowCardsDetail
            
                title="Campaigns"
                icon="campaign_main"
                :leftValue="stats.campaigns.active"
                leftLable="Active"
                :rightValue="stats.campaigns.total-stats.campaigns.active"
                rightLable="Inactive"
                class="grow w-full"
            />
            <ElectionsShowCardsDetail
            
                title="Voters"
                icon="thumb_up"
                :leftValue="stats.voters.voted"
                leftLable="Accepted"
                :rightValue="stats.voters.total-stats.voters.voted"
                rightLable="Declined"
                class="grow w-full"
            />
            <ElectionsShowCardsDetail
            
                title="Nominations"
                icon="users"
                :leftValue="stats.nominations.approved"
                leftLable="Active"
                :rightValue="stats.nominations.submitted-stats.nominations.approved"
                rightLable="Inactive"
                class="grow w-full"
            />
            <ElectionsShowCardsDetail
            
                title="Polling Stations"
                icon="polling_station"
                :leftValue="stats.pollingStations.active"
                leftLable="Active"
                :rightValue="stats.pollingStations.total-stats.pollingStations.active"
                rightLable="Inactive"
                class="grow w-full"
            />
            

        </div>

        <div class="grid grid-cols-7 _md:flex flex-col gap-4 sm:gap-6">
            <ElectionsShowCardsStagesVoting class="" />
            <ElectionsShowCardsTimeline class="" :stages="election.stages" />

            <ElectionsShowCardsStagesNomination class="" />
            <ElectionsShowCardsTimeline class="" :stages="election.stages" />

            <ElectionsShowCardsFinance class="" />
            <ElectionsShowCardsTimeline class="" :stages="election.stages" />

            <ElectionsShowCardsStagesCampaign class="" />
            <ElectionsShowCardsTimeline class="" :stages="election.stages" />
        </div>
    </div>
</template>
