<script setup lang="ts">
import {
    Election,
    Stage,
    StageStats,
} from "~/resources/interfaces/elections/show.interface";
import { ElectionBallotProps } from "~/resources/interfaces/voting/polling-stations/index.interface";

useHead({
    title: "Election Details",
});

const props = defineProps<{
    election: Election;
    stats: App.Data.CardStatData[];
    stage?: Stage | null;
    stageStats: StageStats;
    leadingCandidatesBallots?: ElectionBallotProps[] | null;
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
        <ElectionsShowCardsCreatedBy :stage="stage" :election="election" />
        <div
            class="grid md:grid-cols-2 _md:flex flex-col items-center px-auto xl:grid-cols-4 gap-4 sm:gap-6"
        >
            <ElectionsShowCardsDetail
                v-for="(stat, index) in stats"
                :key="index"
                :data="stat"
                class="grow w-full"
            />
        </div>
        <div class="grid grid-cols-7 _md:flex flex-col gap-4 sm:gap-6">
            <ElectionsShowCardsStagesVoting
                :ballots="leadingCandidatesBallots"
                v-if="stage?.stage == 'voting'"
                :stage-stat="stageStats"
                :stage="stage"
                class=""
            />

            <ElectionsShowCardsStagesNomination
                v-else-if="stage?.stage == 'nominations'"
                :stage-stat="stageStats"
                :stage="stage"
                class=""
            />

            <ElectionsShowCardsStagesCampaign
                v-else-if="stage?.stage == 'campaigns'"
                :stage-stat="stageStats"
                :stage="stage"
                class=""
            />
            <ElectionsShowCardsFinance
                v-else-if="stage == null"
                :stage-stat="stageStats"
                :election-logo="election.logo"
                class=""
            />
            <ElectionsShowCardsTimeline
                class=""
                :stages="election.stages"
                :election-end-date="new Date(election.end)"
            />
        </div>
    </div>
</template>
