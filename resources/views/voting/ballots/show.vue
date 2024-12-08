<script setup lang="ts">
import { Ballot } from "~/resources/interfaces/voting/ballots/show.interface";

useHead({
    title: "Voting: Ballot Details",
});
const props = defineProps<{
    ballot: Ballot;
}>();
</script>

<template layout="main">
    <div class="grid lg:grid-cols-7 gap-4">
        <div class="lg:col-span-4">
            <VotingBallotsShowTable :data="ballot.options" />
        </div>
        <div class="lg:col-span-3 grid sm:_lg:grid-cols-2 gap-4 lg">
            <VotingBallotsShowLeadingCandidate />
            <VotingBallotsShowMessage />
        </div>
    </div>
</template>
