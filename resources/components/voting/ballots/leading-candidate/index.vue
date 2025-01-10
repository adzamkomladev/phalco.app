<script setup lang="ts">
import { ElectionBallotProps } from "~/resources/interfaces/voting/polling-stations/index.interface";
import NoBallotsImage from "~/resources/svg/main/paper_in_box.svg?src";

const props = defineProps<{
    ballot?: ElectionBallotProps;
}>();
</script>

<template>
    <SharedCommonCard
        class="font-medium p-auto h-full items-center shadow-card _sm:shadow _sm:p-5 rounded-2xl"
    >
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Leading Candidates
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                List of the first 2 leading candidates
            </p>
        </div>
        <div v-if="ballot">
            <!--  -->
            <p class="ml-2">{{ ballot.ballotName }}</p>
            <div class="" v-for="(candidate, ci) in ballot.candidates">
                <VotingBallotsLeadingCandidateRow
                    :index="ci"
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
                :src="NoBallotsImage"
                class="w-[50%] _sm:w-[60%] _xl:md:w-[60%] max-h-96 place-self-center"
            />
            <p class="text-black/70 pt-4 capitalize place-self-center">
                no candidate(s) available
            </p>
        </div>
    </SharedCommonCard>
</template>
