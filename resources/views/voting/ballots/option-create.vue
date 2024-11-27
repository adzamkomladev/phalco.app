<script setup lang="ts">
import BallotImage from "~/resources/images/voting/ballot.webp?src";

useHead({
    title: "Voting: New Ballot",
});

const elections: any = useProperty("elections.all");

const isUpload = ref(false);


</script>

<template>
    <SharedCommonOverlay
        title="Creaate New Ballot"
        class="max-w-xl w-xl _sm:max-w-full"
    >
        <div
            class="flex flex-row-reverse rounded-3xl bg-secondary-300 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
        >
            <div class="font-medium pt-10 basis-1/2 shrink-0 grow">
                <p class="text-gray-50 text-lg dark:text-gray-100">
                    Add new Ballot
                </p>
                <p
                    class="font-normal text-xs pr-5 dark:text-gray-300 text-gray-100"
                >
                    Select or create a new account for withdwaral purposes
                </p>
            </div>
            <div class="h-52 p-5 shrink-0">
                <img :src="BallotImage" class="_sm:hidden h-full w-auto" />
            </div>
        </div>
        <div class="mt-5">
            <VotingBallotsOptionForm  :elections="elections" />
        </div>
    </SharedCommonOverlay>
</template>
