<script setup lang="ts">
const props = defineProps<{
    length?: number;
}>();

const otp = reactive(Array(props.length).fill(""));

const emit = defineEmits(["updateOtp"]);

const handleInput = (index: number, event: Event) => {
    const input = (event.target as HTMLInputElement).value;
    otp[index] = input;

    if (input && index < otp.length - 1) {
        const nextInput =
            document.querySelectorAll<HTMLInputElement>("#otp-form input")[
                index + 1
            ];
        nextInput?.focus();
    }

    emit("updateOtp", otp.join(""));
};

const handleKeyDown = (event: KeyboardEvent, index: number) => {
    const key = event.key;
    if (
        !/^[0-9]{1}$/.test(key) &&
        key !== "Backspace" &&
        key !== "Delete" &&
        key !== "Tab" &&
        !event.metaKey
    ) {
        event.preventDefault();
    }

    if (
        (key === "Backspace" || key === "Delete") &&
        index > 0 &&
        otp[index] === ""
    ) {
        const prevInput =
            document.querySelectorAll<HTMLInputElement>("#otp-form input")[
                index - 1
            ];
        prevInput?.focus();
    }
};

const handleFocus = (event: FocusEvent) => {
    const target = event.target as HTMLInputElement;
    target.select();
};
</script>

<template>
    <div
        id="otp-form"
        class="flex gap-3 sm:gap-8 justify-center sm:landscape:justify-start"
    >
        <input
            v-for="(digit, index) in otp"
            :key="index"
            type="text"
            maxlength="1"
            class="shadow-xs w-14 sm:w-20 h-24 items-center justify-center rounded-lg border border-gray-200 border-stroke bg-gray-100 p-2 text-center text-2xl sm:text-3xl font-medium text-gray-500 outline-none sm:text-4xl dark:border-gray-600 dark:bg-gray-700"
            @input="handleInput(index, $event)"
            @keydown="handleKeyDown($event, index)"
            @focus="handleFocus($event)"
        />
    </div>
</template>
