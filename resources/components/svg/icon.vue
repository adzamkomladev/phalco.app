<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        name?: string;
        size?: number;
        color?: string;
    }>(),
    { size: 24, color: "#000", name: "diamond" },
);

const Icon = ref(null);

watchEffect(async () => {
    if (props.name) {
        Icon.value = (await import(`./icon/${props.name}.vue`)).default;
    }
});
</script>

<template>
    <component
        v-if="Icon"
        :is="Icon"
        :style="{ height: size + 'px', color: color }"
    />
    <p v-else>Icon not found</p>
</template>
