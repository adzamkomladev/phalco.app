<script setup lang="ts">
import { BaseSelectProps } from "~/resources/interfaces/shared/form.interface";

const props = withDefaults(defineProps<BaseSelectProps>(), {
    id: `select-${Math.random() * 1000}`,
    placeholder: "Select an option..",
});
const model = defineModel({ required: true });

const input = ref<HTMLSelectElement | null>(null);
const focus = () => input.value?.focus();

defineExpose({ focus });

const classes = {
    select: "py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600",
    selectError:
        "py-3 px-4 pe-16 block w-full border-red-500 rounded-lg text-sm focus:border-red-500 focus:ring-red-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:focus:ring-neutral-600",
};
const selectClass = computed(() =>
    props.error ? classes.selectError : classes.select,
);

const describeBy = computed(() => `${props.id}-error`);
</script>

<template>
    <div class="text-base text-gray-500">
        <label
            v-if="props.label"
            :for="props.id"
            class="block mb-2 text-gray-500 text-base dark:text-white"
        >
            {{ props.label }}
        </label>
        <div class="relative">
            <select
                :class="selectClass"
                :id="props.id"
                :name="props.name"
                v-model="model"
                ref="input"
                :aria-describedby="describeBy"
            >
                <option key="x" :value="null">
                    {{ props.placeholder }}
                </option>
                <option
                    v-for="option in props.options"
                    :key="option.value"
                    :value="option.value"
                >
                    {{ option.label }}
                </option>
            </select>
            <div
                v-if="props.error"
                class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-8"
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
