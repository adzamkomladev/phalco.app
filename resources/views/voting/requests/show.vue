<script setup lang="ts">
import VottingRequestImage from "~/resources/images/main/request_details.png?src";
import { VoteRequestresult } from "~/resources/interfaces/voting/requests/show.interface";

const testData: VoteRequestresult = {
    ballotName: "Presidential Election 2024",
    optionsResult: [
        {
            optionfirstName: "John",
            optionLastName: "Doe",
            optionParty: "Unity Party",
            optionVoteCount: 15000,
            optionPosition: 1,
        },
        {
            optionfirstName: "Jane",
            optionLastName: "Smith",
            optionParty: "Progressive Alliance",
            optionVoteCount: 12000,
            optionPosition: 2,
        },
        {
            optionfirstName: "Emily",
            optionLastName: "Johnson",
            optionParty: "Green Future",
            optionVoteCount: 10000,
            optionPosition: 3,
        },
    ],
};

useHead({
    title: "Voting: Vote Entry Request Details",
});

const props = defineProps<{
    voteEntryRequest: any;
}>();
</script>

<template>
    <SharedCommonOverlay
        title="Vote Entry Request Details"
        class="max-w-xl w-xl _sm:max-w-full pb-10"
    >
        <!-- <VotingRequestsFormsUpdateStatus
            v-if="voteEntryRequest.status === 'pending'"
            :vote-entry-request-id="voteEntryRequest.id"
        />
        <pre>{{ voteEntryRequest }}</pre> -->
        <div
            class="flex rounded-3xl bg-secondary-300 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
        >
            <div
                class="font-medium mobile:py-5 mobile_:py-5 place-content-center px-10 basis-1/2 shrink-0 grow"
            >
                <p class="text-gray-50 text-lg dark:text-gray-100">
                    Add new Agent
                </p>
                <p class="font-normal text-xs dark:text-gray-300 text-gray-100">
                    Select or create a new account for withdwaral purposes
                </p>
            </div>
            <div class="">
                <img
                    :src="VottingRequestImage"
                    class="mobile:hidden h-52 w-auto"
                />
            </div>
        </div>
        <div class="mt-5 grid gap-4 sm:gap-8">
            <VotingRequestsShowResponse />
            <VotingRequestsShowResultList
                :ballot-name="testData.ballotName"
                :options-result="testData.optionsResult"
            />
        </div>
        <VotingRequestsShowFeedback />
    </SharedCommonOverlay>
</template>
