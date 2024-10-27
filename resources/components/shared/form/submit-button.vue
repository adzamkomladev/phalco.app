<script setup lang="ts">
import { SubmitButtonProps } from "~/resources/interfaces/shared/form.interface";

const props = defineProps<SubmitButtonProps>();
</script>

<template>
    <button
        :disabled="loading"
        type="submit"
        class="w-full font-black py-2 px-4 inline-flex justify-center items-center gap-x-2 text-base xl:text-lg rounded-lg border border-transparent bg-primary-600 dark:bg-primary-800 text-white hover:opacity-90 focus:outline-none focus:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none"
    >
        <span
            v-if="loading"
            class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
            role="status"
            aria-label="loading"
        ></span>

        {{ text }}
    </button>
</template>
