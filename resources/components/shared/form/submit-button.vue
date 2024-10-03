<script setup lang="ts">
const props = defineProps<{
    isLoading?: boolean;
    text?: string;
    type?: "submit" | "primary" | "";
}>();

// If no message is passed, we assign the default here
const text = props.text || "Login";
const type = props.type || "submit";
const isLoading = props.isLoading || false;
</script>

<template>
    <button
        :disabled="isLoading"
        type="submit"
        class="w-full font-black py-2 px-4 inline-flex justify-center items-center gap-x-2 text-sm font- rounded-lg border border-transparent bg-primary-500 dark:bg-primary-800 text-white hover:opacity-90 focus:outline-none focus:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none"
    >
        <span
            v-if="isLoading"
            class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
            role="status"
            aria-label="loading"
        ></span>

        {{ text }}
    </button>
</template>
