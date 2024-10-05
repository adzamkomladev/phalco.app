<script setup lang="ts">
useHead({
    title: "Voting: New Ballot",
});

const props = defineProps<{
    elections: { id: number; name: string }[];
}>();


</script>

<template>
    <SharedCommonOverlay title="New Ballot" size="xl">
        <div class="mt-5">
            <VotingBallotsFormsCreate
                :elections="props.elections"
            />
        </div>
    </SharedCommonOverlay>
</template>
