<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        isSuccess: boolean;
    }>(),
    {
        isSuccess: true,
    },
);
</script>

<template>
    <span
        :class="[isSuccess ? 'bg-teal-600' : 'bg-crimson-500']"
        class="size-5 asect-square place-content-center place-items-center text-white rounded-full"
    >
        <SharedCommonIcon v-if="isSuccess" name="check" class="size-3" />
        <SharedCommonIcon v-else name="close" />
    </span>
</template>
