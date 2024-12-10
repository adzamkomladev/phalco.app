<script setup lang="ts">
import { SearchInputProps } from "~/resources/interfaces/shared/form.interface";

const props = withDefaults(defineProps<SearchInputProps>(), {
    placeholder: "",
});

const model = defineModel({ required: true });

const input = ref<HTMLInputElement | null>(null);
const focus = () => input.value?.focus();
const select = () => input.value?.select();
defineExpose({ focus, select });

</script>

<template>
    <div>
        <label v-if="props.label" :for="props.id" class="sr-only">
            {{ props.label }}
        </label>
        <div class="relative">
            <input
                ref="input"
                type="text"
                :id="props.id"
                :name="props.name"
                :placeholder="props.placeholder"
                v-model="model"
                class="py-2 px-3 peer ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-primary-400 focus:ring-primary-400 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600"
            />
            <div
                class="absolute peer-focus:text-primary-500 inset-y-0 start-0 flex items-center pointer-events-none ps-4"
            >
                <svg
                    class="shrink-0 size-4 "
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
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
            </div>
        </div>
    </div>
</template>
