<script setup lang="ts">
import { CreateVoteRequestProps } from "~/resources/interfaces/agents/create.interface";

useHead({
    title: "Agents: Submit Vote Request",
});

defineProps<CreateVoteRequestProps>();
</script>

<template>
    <SharedCommonOverlay
        title="Submit Vote Request"
        class="max-w-xl _sm:max-w-full w-[500px]"
    >
        <div class="mt-5">
            <HomeAgentsRequestCreateForm :ballot="ballot" />
        </div>
    </SharedCommonOverlay>
</template>
