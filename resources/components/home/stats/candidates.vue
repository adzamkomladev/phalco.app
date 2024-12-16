<script lang="ts" setup>
import {
    ElectionCandidateProps,
    ElectionBallotProps,
} from "~/resources/interfaces/voting/polling-stations/index.interface";
import { formatDate, secondsUntil } from "~/resources/utils/shared/date";
import NoLeadingCandidateImage from '~/resources/svg/main/no_data.svg?src'


const props = defineProps<{

    ballots: ElectionBallotProps[];
}>();
</script>

<template>
    <SharedCommonCard
        class="gap-2 shrink-0 dark:text-gray-400 flex flex-col col-span-4"
    >
        <div class="flex-col flex gap-2">
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

        <div v-if="ballots" class="flex flex-col gap-5 h-full">
            <p class="font-semibold text-lg ml-2">Leading Candidates</p>
            <div v-for="(ballot, bi) in ballots">
                <p class="ml-2">{{ ballot.ballotName }}</p>
                <div class="" v-for="(candidate, ci) in ballot.candidates">
                    <HomeStatsCandidatesRow
                        :index="ci"
                        :candidate-name="candidate.candidateName"
                        :candidate-picture="candidate.candidatePicture"
                        :party-logo="candidate.partyLogo"
                        :party-name-abrev="candidate.partyNameAbrev"
                        :votes="candidate.votes"
                    />
                </div>
            </div>
            

        </div>
        <div class="p-5" v-else>
                <img
                    :src="NoLeadingCandidateImage"
                    class="h-[50vh] max-h-96 place-self-center"
                />
                <p class="text-black/50 text-center pt-4">
                    no Data
                </p>
            </div>
    </SharedCommonCard>
</template>
