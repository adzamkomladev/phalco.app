<script setup lang="ts">
useHead({
    title: "SMS Campaigns Senders",
});

defineProps<{
    senders: App.Data.Campaigns.Sms.SenderData[];
}>();
</script>

<template>
    <SharedCommonOverlay
        class="max-w-xl _sm:max-w-full"
        title="SMS Campaigns Senders"
        size="xl"
    >
        <pre>{{ senders }}</pre>
        <p>Add new sender</p>
    </SharedCommonOverlay>
</template>
