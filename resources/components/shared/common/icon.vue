<script setup lang="ts">
import { SharedIconProp } from '~/resources/interfaces/shared/icon.interface';

const props = withDefaults(
    defineProps<SharedIconProp>(),
    { size: 24, name: "diamond" },
);

let Icon = ref(null);

onMounted(async () => {
    Icon.value = await import(`../../../svg/icon/${props.name}.svg?component`);
});
</script>

<template>
    <Icon v-if="Icon" :height="size" v-bind:style="color ? { color } : null" />
    <p v-else></p>
</template>
