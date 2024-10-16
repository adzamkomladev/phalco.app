<script setup lang="ts">
const props = withDefaults(defineProps<{ text?: string }>(), {
    text: "Sign in with Google",
});
</script>

<template>
    <router-link
        :href="route('google.redirect')"
        type="button"
        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm 2xl:text-base font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-white dark:hover:bg-gray-900 dark:focus:bg-neutral-800"
    >
    <SharedCommonIcon/>

        {{ props.text }}
    </router-link>
</template>
