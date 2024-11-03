<script setup lang="ts">
import { ref, computed, onMounted, onBeforeUnmount, watch } from "vue";

const props = withDefaults(
    defineProps<{
        id?: string;
        placeholder?: string;
        required?: boolean;
    }>(),
    {
        id: `input-${Math.random() * 1000}`,
        placeholder: "Select date range",
        required: true,
    },
);

const model = ref<string>("");
const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];

const year = ref(new Date().getFullYear());
const month = ref(new Date().getMonth());
const selectedStartDay = ref<number | null>(null);
const selectedEndDay = ref<number | null>(null);
const calendarVisible = ref(false);
const datePicker = ref<HTMLElement | null>(null);

const formattedDateRange = computed(() => {
    if (selectedStartDay.value && selectedEndDay.value) {
        const startDate = new Date(selectedStartDay.value);
        const endDate = new Date(selectedEndDay.value);
        return `${startDate.toLocaleDateString()} - ${endDate.toLocaleDateString()}`;
    }
    return "";
});

const getNumberOfDays = (year: number, month: number) =>
    new Date(year, month + 1, 0).getDate();

const getMonthDetails = (year: number, month: number) => {
    const firstDay = new Date(year, month).getDay();
    const numberOfDays = getNumberOfDays(year, month);
    const monthArray = [];
    for (let i = 0; i < 42; i++) {
        const dayDetails = getDayDetails({
            index: i,
            firstDay,
            year,
            month,
            numberOfDays,
        });
        monthArray.push(dayDetails);
    }
    return monthArray;
};

const getDayDetails = ({
    index,
    firstDay,
    year,
    month,
    numberOfDays,
}: {
    index: number;
    firstDay: number;
    year: number;
    month: number;
    numberOfDays: number;
}) => {
    const date = index - firstDay;
    const actualDate =
        date < 0 ? numberOfDays + date : (date % numberOfDays) + 1;
    const monthIndicator = date < 0 ? -1 : date >= numberOfDays ? 1 : 0;
    const timestamp = new Date(year, month, actualDate).getTime();
    return { date: actualDate, timestamp, month: monthIndicator };
};

const monthDetails = computed(() => getMonthDetails(year.value, month.value));

const toggleCalendar = () => {
    calendarVisible.value = !calendarVisible.value;
};

const changeMonth = (offset: number) => {
    month.value += offset;
    if (month.value < 0) {
        month.value = 11;
        year.value--;
    } else if (month.value > 11) {
        month.value = 0;
        year.value++;
    }
};

const selectDay = (day: { timestamp: number }) => {
    if (
        selectedStartDay.value === null ||
        (selectedEndDay.value && selectedStartDay.value)
    ) {
        selectedStartDay.value = day.timestamp;
        selectedEndDay.value = null; // Reset end day when starting a new selection
    } else {
        // If end day is not selected, set it
        selectedEndDay.value = day.timestamp;
    }
};

watch([selectedStartDay, selectedEndDay], () => {
    model.value = formattedDateRange.value;
});

const handleClickOutside = (event: Event) => {
    if (datePicker.value && !datePicker.value.contains(event.target as Node)) {
        calendarVisible.value = false;
    }
};

onMounted(() => {
    document.addEventListener("click", handleClickOutside);
});

onBeforeUnmount(() => {
    document.removeEventListener("click", handleClickOutside);
});
</script>

<template>
    <div class="relative" ref="datePicker">
        <label :for="props.id" class="block text-gray-600 mb-1">{{
            props.placeholder
        }}</label>
        <input
            type="text"
            id="date"
            readonly
            @click="toggleCalendar"
            v-model="model"
            class="py-2 px-4 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 w-full"
            :placeholder="props.placeholder"
        />
        <div
            v-if="calendarVisible"
            class="absolute z-50 bg-white shadow-lg rounded mt-1"
        >
            <div
                class="flex items-center justify-between px-2 py-1 bg-gray-100"
            >
                <button @click="changeMonth(-1)">&#x3C;</button>
                <span>{{ months[month.value] }} {{ year.value }}</span>
                <button @click="changeMonth(1)">&#x3E;</button>
            </div>
            <div class="grid grid-cols-7 gap-2 p-2">
                <div
                    v-for="day in days"
                    :key="day"
                    class="text-center font-bold"
                >
                    {{ day }}
                </div>
            </div>
            <div class="grid grid-cols-7 gap-2">
                <div
                    v-for="day in monthDetails"
                    :key="day.timestamp"
                    class="text-center p-2 cursor-pointer rounded"
                    :class="{
                        'bg-blue-200':
                            day.timestamp === selectedStartDay?.value ||
                            day.timestamp === selectedEndDay.value,
                        'bg-blue-400 text-white':
                            selectedStartDay.value &&
                            selectedEndDay.value &&
                            day.timestamp > selectedStartDay.value &&
                            day.timestamp < selectedEndDay.value,
                        'text-gray-400': day.month !== 0,
                    }"
                    @click="selectDay(day)"
                >
                    <span>{{ day.date }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Add any styles specific to this component here */
</style>
