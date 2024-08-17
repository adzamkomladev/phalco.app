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
                class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
            />
        </div>
        <div class="ms-3">
            <label
                v-if="props.label"
                :for="props.id"
                class="text-sm dark:text-white"
                >{{ props.label }}</label
            >
        </div>
    </div>
</template>
