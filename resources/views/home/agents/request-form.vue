<script setup lang="ts">
useHead({
    title: "Voting: New Ballot",
});
</script>

<template>
    <SharedCommonOverlay
        title="New Ballot"
        class="max-w-xl _sm:max-w-full w-[500px]"
    >
        <div class="mt-5">
            <HomeAgentsRequestForm :elections="elections" />
        </div>
    </SharedCommonOverlay>
</template>
