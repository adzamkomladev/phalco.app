<script setup lang="ts">
useHead({
    title: "Create New SMS Campaigns",
});

const props = defineProps<{
    senders: App.Data.Campaigns.Sms.SenderData[];
}>();
</script>

<template layout="main">
    <div>
        <p>Create New SMS campaigns</p>
    </div>
</template>
