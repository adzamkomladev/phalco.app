<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        name?: string;
        size?: number;
        color?: string;
    }>(),
    { size: 24, color: "#000", name: "diamond" },
);

let Icon = ref(null);

onMounted(async () => {
    Icon.value = await import(`../../../svg/icons/${props.name}.svg?component`);
});
</script>

<template>
    <Icon v-if="Icon" :height="size" :width="size" :style="{color}" />
    <p v-else></p>
</template>
