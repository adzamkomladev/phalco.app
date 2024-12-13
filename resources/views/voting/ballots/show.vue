<script setup lang="ts">
import {
    Ballot,
    BallotHeader,
    Option,
} from "~/resources/interfaces/voting/ballots/show.interface";

useHead({
    title: "Voting: Ballot Details",
});

const props = defineProps<{
    ballot: Ballot;
}>();

const ballotHeader = computed<BallotHeader>(() => ({
    title: `${props.ballot.position} - ${props.ballot.code}`,
    description: props.ballot.description,
    status: props.ballot.status,
}));

const leadingCandidate = computed<Option | null>(() => {
    const sorted = props.ballot.options.sort(
        (a: Option, b: Option) => b.votes - a.votes,
    );

    return sorted[0]?.votes > 0 ? sorted[0] : null;
});
</script>

<template layout="main">
    <div class="grid lg:grid-cols-7 gap-4">
        <div class="lg:col-span-4">
            <VotingBallotsShowTable
                :ballot-header="ballotHeader"
                :data="ballot.options"
                :ballot-id="ballot.id"
            />
        </div>
        <div class="lg:col-span-3 grid sm:_lg:grid-cols-2 gap-4 lg">
            <VotingBallotsShowLeadingCandidate
                :candidate="leadingCandidate"
                :position="ballot.position"
            />
            <VotingBallotsShowMessage />
        </div>
    </div>
</template>
