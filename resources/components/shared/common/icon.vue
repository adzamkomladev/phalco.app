<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        name?: string;
        size?: number;
        color?: string;
    }>(),
    { size: 24, name: "diamond" },
);

let Icon = ref(null);

onMounted(async () => {
    Icon.value = await import(`../../../svg/icon/${props.name}.svg?component`);
});
</script>

<template>
    <Icon v-if="Icon" :height="size" v-bind:style="color ? { color } : null" />
    <p v-else>!</p>
</template>
