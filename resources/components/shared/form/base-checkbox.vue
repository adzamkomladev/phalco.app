<script setup lang="ts">
import { BaseCheckboxProps } from "~/resources/interfaces/shared/form.interface";

const props = withDefaults(defineProps<BaseCheckboxProps>(), {
    id: `input-${Math.random() * 1000}`,
});
const model = defineModel({ required: true });

const input = ref<HTMLInputElement | null>(null);
const focus = () => input.value?.focus();
const select = () => input.value?.select();
defineExpose({ focus, select });
</script>

<template>
    <div class="flex items-center">
        <div class="flex">
            <input
                ref="input"
                :id="props.id"
                :name="props.name"
                v-model="model"
                type="checkbox"
                class="shrink-0 mt-0.5 border-gray-200 rounded text-primary-600 focus:ring-primary-500 dark:bg-gray-700 dark:border-neutral-700 dark:checked:bg-primary-500 dark:checked:border-primary-500 dark:focus:ring-offset-gray-800"
            />
        </div>
        <div class="ms-3">
            <label
                v-if="props.label"
                :for="props.id"
                class="text-sm sm:text-base text-gray-500 dark:text-gray-300"
                >{{ props.label }}</label
            >
        </div>
    </div>
</template>
