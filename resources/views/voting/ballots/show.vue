<script setup lang="ts">
useHead({
    title: "Voting: Ballot Details",
});
const props = defineProps<{
    ballot: any;
}>();
</script>

<template layout="main">
    <div class="grid lg:grid-cols-7 gap-4">
        <div class="lg:col-span-4">
            <VotingBallotsShowTable />
        </div>
        <div class="lg:col-span-3 grid sm:_lg:grid-cols-2 gap-4 lg">
            <VotingBallotsShowLeadingCandidate />
            <VotingBallotsShowMessage />
        </div>
    </div>
</template>
