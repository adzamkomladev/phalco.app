<script setup lang="ts">
import {
    Election,
    Stage,
    StageStats,
    Stats,
} from "~/resources/interfaces/elections/show.interface";
import {
    ElectionBallotProps,
    ElectionCandidateProps,
} from "~/resources/interfaces/voting/polling-stations/index.interface";

useHead({
    title: "Home",
});

const elections = useProperty("elections");
const props = defineProps<{
    stats: any;
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

const electionStats = {
    totalBalance: 4000,
    totalDonations: 2300,
    totalNominations: 20,
    spent: {
        jan: 0,
        feb: 110,
        mar: 0,
        apr: 230,
        may: 70,
        jun: 0,
        jul: 90,
        aug: 0,
        sep: 560,
        oct: 0,
        nov: 450,
        dec: 0,
    },
};
</script>

<template layout="main">
    <div
        class="max-w-[100rem] px-4 flex flex-col gap-8 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <div
            class="grid sm:grid-cols-2 _sm:flex flex-col items-center px-auto xl:grid-cols-4 gap-4 sm:gap-6"
        >
            <!-- <ElectionsShowCardsDetail
                title="Campaigns"
                icon="campaign_main"
                :left-value="stats?.campaigns?.total || 0"
                left-label="Total"
                :right-value="stats?.campaigns?.active || 0"
                right-label="Active"
                class="grow w-full"
            />
            <ElectionsShowCardsDetail
                title="Voters"
                icon="thumb_up"
                :left-value="stats?.voters?.total || 0"
                left-label="Total"
                :right-value="stats?.voters?.voted || 0"
                right-label="Voted"
                class="grow w-full"
            />
            <ElectionsShowCardsDetail
                title="Nominations"
                icon="users"
                :left-value="stats?.nominations?.submitted || 0"
                left-label="Submitted"
                :right-value="stats?.nominations?.approved || 0"
                right-label="Approved"
                class="grow w-full"
            />
            <ElectionsShowCardsDetail
                title="Polling Stations"
                icon="polling_station"
                :left-value="stats?.pollingStations?.total || 0"
                left-label="Total"
                :right-value="stats?.pollingStations?.active || 0"
                right-label="Active"
                class="grow w-full"
            /> -->
        </div>

        <div class="grid grid-cols-2 _md:flex flex-col gap-4 sm:gap-6">
            <HomeStatsTimeleft />
            <HomeStatsPopularPollingStation />
        </div>
        <HomeStatsCandidates :ballots="dummyBallots" />

        <div class="grid grid-cols-2 _md:flex flex-col gap-4 sm:gap-6">
            <HomeStatsAgentReport />
            <HomeStatsFinance
                :election-logo="elections.all?.[0]?.logo"
                :stage-stat="electionStats"
            />
        </div>
        <pre></pre>
    </div>
</template>
