<script setup lang="ts">
import { BaseTextareaProps } from "~/resources/interfaces/shared/form.interface";

const props = withDefaults(defineProps<BaseTextareaProps>(), {
    id: `textarea-${Math.random() * 1000}`,
    placeholder: "",
    required: true,
    autocomplete: "on",
    rows: 6,
});
const model = defineModel({ required: true });

const textarea = ref<HTMLTextAreaElement | null>(null);
const focus = () => textarea.value?.focus();
const select = () => textarea.value?.select();
defineExpose({ focus, select });

const classes = {
    textarea:
        "py-2 px-3 block w-full  min-h-28 h-28 max-h-48 placeholder:text-gray-500  placeholder:text-base text-gray-700 border-gray-200 rounded-lg text-base  focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600",
    textareaError:
        "py-3 px-4 block w-full  min-h-28 h-28 max-h-48 border-red-500 rounded-lg text-sm focus:border-red-500 bg-transparent focus:ring-red-500 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600",
};
const textareaClass = computed(() =>
    props.error ? classes.textareaError : classes.textarea,
);
const describeBy = computed(() => `${props.id}-error`);
</script>

<template>
    <div>
        <div class="flex justify-between items-center">
            <label
                v-if="props.label"
                :for="props.id"
                class="block text-sm mb-2 dark:text-white"
            >
                {{ props.label }}
            </label>
        </div>
        <div class="relative">
            <textarea
                ref="textarea"
                :id="props.id"
                :name="props.name"
                :class="textareaClass"
                :placeholder="props.placeholder"
                :required="props.required"
                :autocomplete="props.autocomplete"
                :aria-describedby="describeBy"
                :rows="props.rows"
                v-model="model"
            ></textarea>
            <div
                v-if="props.error"
                class="absolute top-0 end-0 flex items-center pointer-events-none p-3"
            >
                <svg
                    class="shrink-0 size-4 text-red-500"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" x2="12" y1="8" y2="12"></line>
                    <line x1="12" x2="12.01" y1="16" y2="16"></line>
                </svg>
            </div>
        </div>
        <p
            v-if="props.error"
            class="text-xs text-red-600 mt-2"
            :id="describeBy"
        >
            {{ props.error }}
        </p>
    </div>
</template>
