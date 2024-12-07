<script setup lang="ts">
import {
    Election,
    Stage,
    StageStats,
    Stats,
} from "~/resources/interfaces/elections/selected.interface";
import {
    ElectionBallotProps,
    ElectionCandidateProps,
} from "~/resources/interfaces/voting/polling-stations/index.interface";

useHead({
    title: "Election Details",
});

const props = defineProps<{
    election: Election;
    stats: Stats;
    stage: Stage;
    stageStats: StageStats;
}>();

const dummyBallots: ElectionBallotProps[] = [
    {
        ballotName: "Presidential Ballot",
        candidates: [
            {
                candidateFirstName: "John",
                candidateSecondName: "Doe",
                candidateName: "John Doe",
                candidatePicture: "https://example.com/john_doe.jpg",
                partyNameFull: "Party A",
                partyNameAbrev: "PA",
                partyLogo:
                    "https://th.bing.com/th/id/R.5dc0aa315b1d9c62e1fb4052caa50bbf?rik=2SjuMfAwfJTGlQ&pid=ImgRaw&r=0",
                votes: 1000,
            },
            {
                candidateName: "Jane Smith",
                candidatePicture: "https://example.com/jane_smith.jpg",
                partyNameFull: "Party B",
                partyNameAbrev: "PB",
                partyLogo:
                    "https://th.bing.com/th/id/OIP.1UtTiSv25u7P4FO6hsFs5wHaEi?rs=1&pid=ImgDetMain",
                votes: 800,
            },
        ],
    },
    {
        ballotName: "Parliamentary Ballot",
        candidates: [
            {
                candidateFirstName: "Michael",
                candidateSecondName: "Johnson",
                candidateName: "Michael Johnson",
                candidatePicture: "https://example.com/michael_johnson.jpg",
                partyNameFull: "Party C",
                partyNameAbrev: "PC",
                partyLogo:
                    "https://th.bing.com/th/id/OIP.1UtTiSv25u7P4FO6hsFs5wHaEi?rs=1&pid=ImgDetMain",
                votes: 600,
            },
        ],
    },
];

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
                :ballots="dummyBallots"
                v-if="stage?.stage == 'voting'"
                :stage-stat="stageStats"
                :stage="stage"
                class=""
                :can
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
