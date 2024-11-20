<script setup lang="ts">
import {
    Election,
    Stage,
    StageStats,
    Stats,
} from "~/resources/interfaces/elections/selected.interface";

useHead({
    title: "Election Details",
});

const props = defineProps<{
    election: Election;
    stats: Stats;
    stage: Stage;
    stageStats: StageStats;
}>();

// const { user } = useSecurity();
</script>

<template layout="main">
    <div
        class="max-w-[100rem] px-4 flex flex-col gap-8 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <ElectionsShowCardsCreatedBy :election="election" />
        <div
            class="grid md:grid-cols-2 _md:flex flex-col items-center px-auto xl:grid-cols-4 gap-4 sm:gap-6"
        >
            <ElectionsShowCardsDetail
                title="Campaigns"
                icon="campaign_main"
                :left-value="stats.campaigns.total"
                left-label="Total"
                :right-value="stats.campaigns.active"
                right-label="Active"
                class="grow w-full"
            />
            <ElectionsShowCardsDetail
                title="Voters"
                icon="thumb_up"
                :left-value="stats.voters.total"
                left-label="Total"
                :right-value="stats.voters.voted"
                right-label="Voted"
                class="grow w-full"
            />
            <ElectionsShowCardsDetail
                title="Nominations"
                icon="users"
                :left-value="stats.nominations.submitted"
                left-label="Submitted"
                :right-value="stats.nominations.approved"
                right-label="Approved"
                class="grow w-full"
            />
            <ElectionsShowCardsDetail
                title="Polling Stations"
                icon="polling_station"
                :left-value="stats.pollingStations.total"
                left-label="Total"
                :right-value="stats.pollingStations.active"
                right-label="Active"
                class="grow w-full"
            />
        </div>

        <div class="grid grid-cols-7 _md:flex flex-col gap-4 sm:gap-6">
            <ElectionsShowCardsStagesVoting
                v-if="stage?.stage == 'voting'"
                :stage-stat="stageStats"
                :stage="stage"
                class=""
            />

            <ElectionsShowCardsStagesNomination
                v-if="stage?.stage == 'nominations'"
                :stage-stat="stageStats"
                :stage="stage"
                class=""
            />

            <ElectionsShowCardsFinance
                v-if="stage == null"
                :stage-stat="stageStats"
                :election-logo="election.logo"
                class=""
            />

            <ElectionsShowCardsStagesCampaign
                v-if="stage?.stage == 'campaigns'"
                :stage-stat="stageStats"
                :stage="stage"
                class=""
            />
            <ElectionsShowCardsTimeline
                class=""
                :stages="election.stages"
                :election-end-date="election.end"
            />
        </div>
    </div>
</template>
