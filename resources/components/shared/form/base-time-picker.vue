<template>
    <div class="flex gap-2 items-center">


    <SharedCommonDropdown position="top-center">
        <template v-slot:toggle>
            <button class=" py-1 px-2 pe-6 flex cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus-within:border-blue-500 focus:border-blue-500 focus:ring-red-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 ">
             <span>{{selectedHour}}</span>
             <SharedCommonIcon
                    name="chevron"
                    class="text-gray-300 rotate-180 hs-dropdown-open:rotate-90"
                />
            </button>
        </template>
        
        <div class="max-h-40 overflow-y-scroll flex flex-col bg-white w-20">

         <button
                v-for="(hr, index) in hours"
                :key="index"
                @click=" selectedHour= hr"
                id="hs-dropdown-election"
                type="button"
                aria-haspopup="menu"
                aria-expanded="false"
                aria-label="Dropdown"
                :class="[selectedHour===hr ? '':'' ]"
            >
               {{hr}}
            </button>        
        </div>

    </SharedCommonDropdown>

        <!-- Hour Selector -->
        <select v-model="selectedHour" class="time-picker-select">
            <option v-for="hour in hours" :key="hour" :value="hour">{{ hour }}</option>
        </select>

        <!-- Minute Selector -->
        <select v-model="selectedMinute" class="time-picker-select">
            <option v-for="minute in minutes" :key="minute" :value="minute">{{ minute }}</option>
        </select>

        <!-- AM/PM Selector -->
        <select v-model="selectedAmpm" class="time-picker-select">
            <option v-for="period in ampmOptions" :key="period" :value="period">{{ period }}</option>
        </select>
    </div>
</template>

<script setup lang="ts">
import { ref, watch, defineProps, defineEmits } from "vue";

// Props for initial values and v-model for two-way binding
const props = defineProps<{
    modelValue: string; // Expected time format: "HH:mm"
}>();

const emit = defineEmits(['update:modelValue']);

// Options for hour, minute, and AM/PM
const hours = Array.from({ length: 12 }, (_, i) => (i + 1).toString().padStart(2, '0'));
const minutes = Array.from({ length: 60 }, (_, i) => i.toString().padStart(2, '0'));
const ampmOptions = ['AM', 'PM'];

// Reactive values for the time picker, initialized from modelValue or defaults
const selectedHour = ref(props.modelValue?.split(':')[0] || '12');
const selectedMinute = ref(props.modelValue?.split(':')[1] || '00');
const selectedAmpm = ref(props.modelValue.includes('PM') ? 'PM' : 'AM'); // Default to AM or PM based on modelValue

// Function to convert to 24-hour format
const to24HourFormat = (hour: string, ampm: string): string => {
    let hour24 = parseInt(hour);
    if (ampm === 'PM' && hour24 < 12) {
        hour24 += 12;
    } else if (ampm === 'AM' && hour24 === 12) {
        hour24 = 0; // Midnight case
    }
    return hour24.toString().padStart(2, '0');
};

// Watch for changes in any of the parts, and update modelValue
watch([selectedHour, selectedMinute, selectedAmpm], () => {
    const hour24 = to24HourFormat(selectedHour.value, selectedAmpm.value);
    const newTime = `${hour24}:${selectedMinute.value}`;
    emit('update:modelValue', newTime); // Emit updated time to parent in 24-hour format
});

// Watch for external changes to modelValue
watch(() => props.modelValue, (newValue) => {
    if (newValue) {
        selectedHour.value = newValue.split(':')[0] || '12';
        selectedMinute.value = newValue.split(':')[1] || '00';
        selectedAmpm.value = newValue.includes('PM') ? 'PM' : 'AM'; // Update AM/PM based on modelValue
    }
});
</script>
