<script setup lang="ts">
defineProps<{ methods: any[] }>();
</script>
<template>
    <ul>
        <li v-for="(method, index) in methods" :key="index">{{ method }}</li>
    </ul>
</template>
