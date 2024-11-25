<script setup lang="ts">
useHead({
    title: "Voting: New Ballot",
});

const elections: any = useProperty("elections.all");
</script>

<template>
    <SharedCommonOverlay title="New Ballot" size="xl">
        <div class="mt-5">
            <HomeAgentsRequestForm :elections="elections" />
        </div>
    </SharedCommonOverlay>
</template>
