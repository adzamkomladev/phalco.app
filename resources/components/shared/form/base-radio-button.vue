<script setup lang="ts">
import { BaseRadioButtonProps } from "~/resources/interfaces/shared/form.interface";

const props = withDefaults(defineProps<BaseRadioButtonProps<string>>(), {
    id: `input-${Math.random() * 1000}`,
});
const model = defineModel({ required: true });

</script>

<template>
    <ul class="flex flex-col sm:flex-row">
        <li
            v-for="(option, index) in props.options"
            :key="index"
            class="inline-flex items-center gap-x-2.5 py-3 px-4 text-sm font-medium bg-white border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg sm:-ms-px sm:mt-0 sm:first:rounded-se-none sm:first:rounded-es-lg sm:last:rounded-es-none sm:last:rounded-se-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-white"
        >
            <div class="relative flex items-start w-full">
                <div class="flex items-center h-5">
                    <input
                        :id="props.id + index"
                        :name="props.name"
                        :value="option.value"
                        v-model="model"
                        type="radio"
                        class="border-gray-200 rounded-full disabled:opacity-50 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                    />
                </div>
                <label
                    :for="props.id + index"
                    class="ms-3 block w-full text-sm text-gray-600 dark:text-neutral-500"
                >
                    {{ option.label }}
                </label>
            </div>
        </li>
    </ul>
</template>
