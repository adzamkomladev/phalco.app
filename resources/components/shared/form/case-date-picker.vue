<script setup lang="ts">
import { BaseInputProps } from "~/resources/interfaces/shared/form.interface";
import { ref, computed } from "vue";

const props = withDefaults(defineProps<BaseInputProps>(), {
    id: `input-${Math.random() * 1000}`,
    type: "date", // Default to "date" but can be overridden
    placeholder: "",
    required: true,
    autocomplete: "on",
});
const model = defineModel({ required: true });

const input = ref<HTMLInputElement | null>(null);
const focus = () => input.value?.focus();
const select = () => input.value?.select();
defineExpose({ focus, select });

const classes = {
    input: "py-3 font-light shadow-sm px-4 text-[1.15rem] lg:text-lg block text-gray-700 w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 placeholder:text-gray-500 placeholder:text-[1rem] disabled:pointer-events-none dark:bg-transparent dark:border-gray-600 dark:text-neutral-400 dark:placeholder-gray-500 dark:focus:ring-neutral-600",
    inputError:
        "py-3 px-4 block w-full border-red-500 rounded-lg text-sm focus:border-red-500 focus:ring-red-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400",
};
const inputClass = computed(() =>
    props.error ? classes.inputError : classes.input,
);
const describeBy = computed(() => `${props.id}-error`);

// Opens the date picker
const openDatePicker = () => {
    input.value?.focus();
};
</script>

<template>
    <div>
        <div class="flex justify-between items-center">
            <label
                v-if="props.label"
                :for="props.id"
                class="block text-gray-500 lg:text-base mb-2 dark:text-gray-300"
            >
                {{ props.label }}
            </label>
        </div>
        <div class="relative lg:text-base">
            <input
                ref="input"
                :type="props.type"
                :id="props.id"
                :name="props.name"
                :class="inputClass"
                :placeholder="props.placeholder"
                :required="props.required"
                :autocomplete="props.autocomplete"
                :aria-describedby="describeBy"
                v-model="model"
            />
            <button
                type="button"
                class="absolute inset-y-0 right-3 flex items-center text-gray-500 dark:text-gray-300"
                @click="openDatePicker"
                aria-label="Open calendar"
            >
                <svg
                    class="shrink-0 w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8 7v2M8 7V5a2 2 0 014 0v2m8 0v2M4 7V5a2 2 0 012-2h12a2 2 0 012 2v2M4 11h16M4 15h16M4 19h16M4 11a2 2 0 012-2h12a2 2 0 012 2M4 15a2 2 0 012-2h12a2 2 0 012 2M4 19a2 2 0 012-2h12a2 2 0 012 2"
                    />
                </svg>
            </button>
            <div
                v-if="props.error"
                class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3"
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
