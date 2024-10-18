<script setup lang="ts">
import { OptionInputProps } from "~/resources/interfaces/voting/requests/form.interface";

const props = withDefaults(defineProps<OptionInputProps>(), {
    id: `option-input-${Math.random() * 1000}`,
});
const emit = defineEmits(["update:modelValue"]);

const votes = ref(0);

watch(votes, (newVotes: number) =>
    emit("update:modelValue", { id: props.optionId, votes: +newVotes }),
);
</script>

<template>
    <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
        <div class="sm:col-span-3">
            <label
                class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
            >
                {{ label }}
            </label>
        </div>
        <div class="sm:col-span-9">
            <SharedFormBaseInput v-model="votes" :name="id" />
        </div>
    </div>
</template>
