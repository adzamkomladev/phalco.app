<script setup lang="ts">
import HSPinInput from "@preline/pin-input";
import { BaseOtpProps } from "~/resources/interfaces/shared/form.interface";

const props = withDefaults(defineProps<BaseOtpProps>(), {
    id: `input-${Math.random() * 1000}`,
    length: 6,
});
const model = defineModel({ required: true });

const input = ref<HTMLDivElement | null>(null); // Pin input element

onMounted(() => {
    // Initialize Pin Input
    HSPinInput.autoInit();

    // Retrieve pin input element
    const { element } = HSPinInput.getInstance(input.value!, true) as any;

    // Listen to completed pin input events
    element.on(
        "completed",
        ({ currentValue }: any) => (model.value = currentValue.join("")),
    );
});

const pinInputOptions = JSON.stringify({
    availableCharsRE: "^[0-9]+$",
});
</script>

<template>
    <div
        :id="id"
        ref="input"
        class="flex gap-x-3 justify-center sm:landscape:justify-start"
        :data-hs-pin-input="pinInputOptions"
    >
        <input
            v-for="index in length"
            :key="index"
            type="text"
            class="shadow-xs _md:w-full _xl:landscape:w-full sm:w-20 h-24 items-center justify-center rounded-lg border border-gray-200 border-stroke bg-gray-100 p-2 text-center text-2xl sm:text-3xl font-medium text-gray-500 outline-none sm:text-4xl dark:border-gray-600 dark:bg-gray-700"
            data-hs-pin-input-item=""
            autofocus
        />
    </div>
</template>
