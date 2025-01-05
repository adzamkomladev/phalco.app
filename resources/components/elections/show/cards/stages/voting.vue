<script lang="ts" setup>
import NoLeadingCandidatesImage from "~/resources/svg/main/paper_in_box.svg?src";

import {
    Stage,
    StageStatsVoting,
} from "~/resources/interfaces/elections/show.interface";
import { ElectionBallotProps } from "~/resources/interfaces/voting/polling-stations/index.interface";
import { formatDate, secondsUntil } from "~/resources/utils/shared/date";

const props = defineProps<{
    stageStat: StageStatsVoting;
    stage: Stage;
    ballots: ElectionBallotProps[];
}>();

const timeLeftToEndDate = Math.floor(secondsUntil(props.stage.end));
</script>

<template>
    <SharedCommonCard
        class="gap-2 shrink-0 dark:text-gray-400 flex flex-col col-span-4"
    >
        <div class="flex-col flex gap-2">
            <div class="font-semibold text-lg text-center">
                <span>{{ formatDate(new Date(stage.start), "dd - MMM") }}</span>
                to
                <span>{{
                    formatDate(new Date(stage.end), "dd - MMM , yyyy")
                }}</span>
            </div>
            <div class="text-center">
                <h2
                    class="text-lg font-semibold text-gray-800 dark:text-gray-200"
                >
                    Voting Details
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Lorem ipsum dolor sit, amet consectetur
                </p>
            </div>
        </div>

        <div class="flex flex-col gap-5 h-full">
            <p
                v-if="ballots && ballots.length > 0"
                class="font-semibold text-lg ml-2"
            >
                Leading Candidatesddd
            </p>
            <div
                v-if="ballots && ballots.length > 0"
                v-for="(ballot, bi) in ballots"
            >
                <p class="ml-2">{{ ballot.ballotName }}</p>
                <div class="" v-for="(candidate, ci) in ballot.candidates">
                    <ElectionsShowCardsStagesVotingCandidate
                        :candidate-name="candidate.candidateName"
                        :candidate-picture="candidate.candidatePicture"
                        :party-logo="candidate.partyLogo"
                        :party-name-abrev="candidate.partyNameAbrev"
                        :votes="candidate.votes"
                    />
                </div>
            </div>
            <div
                v-else
                class="p-5 flex _sm:flex-col gap-5 _sm:gap-0 _xl:md:gap-0 _xl:md:flex-col"
            >
                <img
                    :src="NoLeadingCandidatesImage"
                    class="w-[50%] _sm:w-[60%] _xl:md:w-[60%] max-h-96 place-self-center"
                />
                <p class="text-black/70 pt-4 capitalize place-self-center">
                    no leading candidate(s) available
                </p>
            </div>
            <SharedCommonCard
                class="divide-y h-60 divide-gray-300 dark:divide-gray-600 text-sm gap-2 flex flex-col"
            >
                <div class="flex justify-between items-center grow">
                    <div class="flex gap-4 items-center">
                        <span
                            class="bg-slate-100 dark:bg-gray-700 p-2 rounded-lg"
                        >
                            <SharedCommonIcon
                                name="users"
                                stroke-width="2"
                                class="h-6"
                            />
                        </span>
                        <div>
                            <p class="font-bold text-lg">Total Candidates</p>
                            <p class="font-semibold text-sm">
                                {{ stageStat.candidates }}8
                            </p>
                        </div>
                    </div>
                    <div class="group">
                        <SharedCommonIcon
                            name="poles"
                            class="size-6"
                            stroke-width="1"
                        />
                    </div>
                </div>
                <div class="flex justify-between items-center grow pt-4">
                    <div class="flex gap-4 items-center">
                        <span
                            class="bg-slate-100 dark:bg-gray-700 p-2 rounded-lg"
                        >
                            <SharedCommonIcon
                                name="polling_station"
                                stroke-width="2"
                                class="h-6"
                            />
                        </span>
                        <div>
                            <p class="font-bold text-lg">
                                Total Polling Station
                            </p>
                            <p class="font-semibold text-sm">
                                {{ stageStat.pollingStations }}
                            </p>
                        </div>
                    </div>
                    <div class="group">
                        <SharedCommonIcon
                            name="poles"
                            class="size-6"
                            stroke-width="1"
                        />
                    </div>
                </div>
            </SharedCommonCard>
            <router-link
                :href="route('home')"
                class="text-center text-secondary-300"
            >
                Move to dashboard page
            </router-link>
        </div>
    </SharedCommonCard>
</template>
