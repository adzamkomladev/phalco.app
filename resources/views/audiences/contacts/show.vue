<script setup lang="ts">
useHead({
    title: "Audience: Contact Details",
});

const props = defineProps<{
    contact: any;
}>();
</script>

<template>
    <SharedCommonOverlay
        class="max-w-xl _sm:max-w-full"
        title="Contact Details"
        size="xl"
    >
        <pre>{{ contact }}ff</pre>
    </SharedCommonOverlay>
</template>
