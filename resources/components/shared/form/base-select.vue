<script setup lang="ts">
import { BaseSelectProps } from "~/resources/interfaces/shared/form.interface";

const props = withDefaults(defineProps<BaseSelectProps>(), {
    id: `input-${Math.random() * 1000}`,
});
const model = defineModel({ required: true });

const input = ref<HTMLSelectElement | null>(null);
const focus = () => input.value?.focus();

defineExpose({ focus });
</script>

<template>
    <div>
        <label
            v-if="props.label"
            :for="props.id"
            class="block text-sm font-medium mb-2 dark:text-white"
        >
            {{ props.label }}
        </label>

        <select
            class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
            :id="props.id"
            :name="props.name"
            v-model="model"
            ref="input"
        >
            <option
                v-for="option in props.options"
                :key="option.value"
                :value="option.value"
            >
                {{ option.label }}
            </option>
        </select>
    </div>
</template>
