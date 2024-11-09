<script setup lang="ts">
const props = defineProps<{ methods: App.Data.Finance.PaymentMethodData[] }>();

console.log(props.methods);
</script>
<template>
    <ul>
        <li v-for="(method, index) in methods" :key="index">{{ method }}</li>
    </ul>
</template>
