<script setup lang="ts">
import { BaseInputProps } from "~/resources/interfaces/shared/form.interface";

const props = withDefaults(defineProps<BaseInputProps>(), {
    id: `input-${Math.random() * 1000}`,
    type: "text",
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
    input: "py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600",
    inputError:
        "py-3 px-4 block w-full border-red-500 rounded-lg text-sm focus:border-red-500 focus:ring-red-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400",
};
const inputClass = computed(() =>
    props.error ? classes.inputError : classes.input
);
const describeBy = computed(() => `${props.id}-error`);
</script>

<template>
    <div>
        <label
            v-if="props.label"
            :for="props.id"
            class="block text-sm mb-2 dark:text-white"
        >
            {{ props.label }}
        </label>
        <div class="relative">
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
            <div
                v-if="props.error"
                class="absolute inset-y-0 end-0 pointer-events-none pe-3"
            >
                <svg
                    class="size-5 text-red-500"
                    width="16"
                    height="16"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                    aria-hidden="true"
                >
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                    />
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
