<script setup lang="ts">
useHead({
    title: "Finance",
});

const props = defineProps<{
    transactions: Table<{
        id: number;
    }>;
    payments: Table<{
        id: number;
    }>;
    stats: any;
    wallets: any;
}>();
</script>

<template layout="main">
    <pre>{{ wallets }}</pre>
    <pre>{{ stats }}</pre>
    <pre>{{ payments }}</pre>
    <pre>{{ transactions }}</pre>
</template>
