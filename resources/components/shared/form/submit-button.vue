<script setup lang="ts">
import { SubmitButtonProps } from "~/resources/interfaces/shared/form.interface";

const props = defineProps<SubmitButtonProps>();

const typeClass: Record<"submit" | "simple", string> = {
    simple: "py-2 px-4 inline-flex items-center gap-x-2 text-sm rounded-lg border border-gray-200 bg-white shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700",
    submit: "w-full capitalize font-bold py-2 px-4 inline-flex justify-center items-center gap-x-2 text-base xl:text-lg rounded-lg border border-transparent bg-primary-500 dark:bg-primary-800 text-white hover:opacity-90 focus:outline-none focus:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none",
};
</script>

<template>
    <button
        :disabled="props.loading"
        type="submit"
        :class="typeClass[props.type] || typeClass['submit']"
    >
        <span
            v-if="props.loading"
            class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
            role="status"
            aria-label="loading"
        ></span>

        {{ props.text }}
    </button>
</template>
