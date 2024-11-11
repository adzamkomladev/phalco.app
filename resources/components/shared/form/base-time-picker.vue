<script setup lang="ts">
const props = defineProps<{
    modelValue: string;
}>();

const emit = defineEmits(["update:modelValue"]);

const hours = Array.from({ length: 12 }, (_, i) =>
    (i + 1).toString().padStart(2, "0"),
);
const minutes = Array.from({ length: 60 }, (_, i) =>
    i.toString().padStart(2, "0"),
);
const ampmOptions = ["AM", "PM"];

const selectedHour = ref(props.modelValue?.split(":")[0] || "12");
const selectedMinute = ref(props.modelValue?.split(":")[1] || "00");
const selectedAmpm = ref(props.modelValue.includes("PM") ? "PM" : "AM");

const to24HourFormat = (hour: string, ampm: string): string => {
    let hour24 = parseInt(hour);

    if (ampm === "PM" && hour24 < 12) {
        hour24 += 12;
    } else if (ampm === "AM" && hour24 === 12) {
        hour24 = 0;
    }

    return hour24.toString().padStart(2, "0");
};

const to12HourFormat = (hour24: number): string => {
    const hour12 = hour24 % 12 || 12;
    return hour12.toString().padStart(2, "0");
};

watch([selectedHour, selectedMinute, selectedAmpm], () => {
    const hour24 = to24HourFormat(selectedHour.value, selectedAmpm.value);
    const newTime = `${hour24}:${selectedMinute.value}`;
    emit("update:modelValue", newTime);
});

watch(
    () => props.modelValue,
    (newValue: string) => {
        if (newValue) {
            const [hour24, minute] = newValue.split(":").map(Number);
            selectedHour.value = to12HourFormat(hour24);
            selectedMinute.value = minute.toString().padStart(2, "0");
            selectedAmpm.value = hour24 >= 12 ? "PM" : "AM";
        }
    },
);

watch(selectedAmpm, (newAmpm: string) => {
    let hour = parseInt(selectedHour.value);

    if (newAmpm === "PM" && hour < 12) {
        selectedHour.value = to12HourFormat(hour + 12);
    } else if (newAmpm === "AM" && hour >= 12) {
        selectedHour.value = to12HourFormat(hour - 12);
    }
});
</script>

<template>
    <div class="flex gap-2 items-center">
        <SharedFormBaseAdvanceSelect
            optionClass="py-2"
            v-model="selectedHour"
            :options="hours"
            position="top-center"
        /><span class="text-lg text-gray-700">:</span>
        <SharedFormBaseAdvanceSelect
            optionClass="py-2"
            v-model="selectedMinute"
            :options="minutes"
            position="top-center"
        />
        <SharedFormBaseAdvanceSelect
            optionClass="py-2"
            v-model="selectedAmpm"
            :options="ampmOptions"
            position="bottom-center"
        />
    </div>
</template>
