<script setup lang="ts">
import { BaseRadioGroupProps } from "~/resources/interfaces/shared/form.interface";

const props = withDefaults(defineProps<BaseRadioGroupProps>(), {
    id: `input-${Math.random() * 1000}`,
    required: true,
});
const model = defineModel({ required: true });

const input = ref<HTMLInputElement | null>(null);
const focus = () => input.value?.focus();
const select = () => input.value?.select();

defineExpose({ focus, select });

const classes = {
    input: "border-gray-200 rounded-full disabled:opacity-50 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-primary-500 dark:checked:border-primary-500 dark:focus:ring-offset-gray-800",
    inputError:
        "py-3 px-4 block w-full border-red-500  rounded-lg text-sm focus:border-red-500 focus:ring-red-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400",
};
const inputClass = computed(() =>
    props.error ? classes.inputError : classes.input,
);
const describeBy = computed(() => `${props.id}-error`);
</script>

<template>
    <div class="space-y-2">
        <p class="text-gray-500 font-medium">{{ label }}</p>
        <ul class="flex flex-col sm:flex-row">
            <li
                v-for="(option, index) in options"
                class="inline-flex items-center gap-x-2.5 py-3 px-4 text-sm font-medium bg-white border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg sm:-ms-px sm:mt-0 sm:first:rounded-se-none sm:first:rounded-es-lg sm:last:rounded-es-none sm:last:rounded-se-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-white"
            >
                <div class="relative flex items-start w-full">
                    <div class="flex items-center h-5">
                        <input
                            type="radio"
                            :disabled="props.disabled"
                            :id="option"
                            :name="props.name"
                            :class="[inputClass]"
                            :placeholder="props.placeholder"
                            :required="props.required"
                            :aria-describedby="describeBy"
                            v-model="model"
                            :checked="index === 1"
                            :value="option"
                        />
                    </div>

                    <label
                        :for="option"
                        class="ps-3 block w-full text-sm text-gray-600 dark:text-neutral-500"
                    >
                        {{ option }}
                    </label>
                    <p
                        v-if="props.error"
                        class="text-xs text-red-600 mt-2"
                        :id="describeBy"
                    >
                        {{ props.error }}
                    </p>
                </div>
            </li>
        </ul>
    </div>
</template>
