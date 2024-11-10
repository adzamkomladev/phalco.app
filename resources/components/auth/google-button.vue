<script setup lang="ts">
const props = withDefaults(defineProps<{ text?: string }>(), {
    text: "Sign in with Google",
});
</script>

<template>
    <router-link
        :href="route('google.redirect')"
        type="button"
        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm 2xl:text-base font-semibold rounded-lg border border-gray-200 bg-white text-black shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-white dark:hover:bg-gray-900 dark:focus:bg-neutral-800"
    >
        <SharedCommonIcon name="google" />

        {{ props.text }}
        <SharedCommonIcon
            name="chevron"
            class="text-gray-500 rotate-90 h-4"
            stroke-width="1"
        />
    </router-link>
</template>
