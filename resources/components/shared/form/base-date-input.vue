<script setup lang="ts">
import {
    ref,
    computed,
    onMounted,
    onBeforeUnmount,
    watch,
    PropType,
} from "vue";

import { BaseDateInputProps } from "~/resources/interfaces/shared/form.interface";

const props = withDefaults(defineProps<BaseDateInputProps>(), {
    id: `input-${Math.random() * 1000}`,
    type: "date",
    placeholder: "",
    required: true,
    autocomplete: "on",
    scope: "general",
    default: "datetime",
});

const model = defineModel({ required: true });
const emit = defineEmits([
    "update:startDate",
    "update:endDate",
    "validationError",
]);

function updateStartDate(value: Date) {
    emit("update:startDate", value);
}

function updateEndDate(value: Date) {
    emit("update:endDate", value);
}

const days = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
];
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
const selectedDay = ref<number | null>(null);
const selectedTime = ref<string>("12:00"); // Default time
const calendarVisible = ref(false);
const datePicker = ref<HTMLElement | null>(null);
const showError = ref(false);
const errorMessage = ref("");

const formattedDateTime = computed(() => {
    if (selectedDay.value) {
        const date = new Date(selectedDay.value);
        return props.type === "datetime"
            ? `${date.toLocaleDateString()} ${selectedTime.value}`
            : date.toLocaleDateString();
    }
    return "";
});

// Watch selectedDay and selectedTime to update model
watch([selectedDay, selectedTime], () => {
    if (selectedDay.value) {
        const fullDate = new Date(selectedDay.value);
        const [hours, minutes] = selectedTime.value.split(":").map(Number);
        fullDate.setHours(hours, minutes);
        model.value = fullDate; // Ensure model updates with the combined date and time
    }
    validateDates(); // Call validation after updating the model
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

const getMonthStr = (month: number) => months[month];
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

const validateInput = () => {
    if (!selectedDay.value) {
        errorMessage.value = null;
        showError.value = true;
        emit("validationError", true);
    } else {
        showError.value = false;
        errorMessage.value = "";
        emit("validationError", false);
    }
};

const validateDates = () => {
    if (!selectedDay.value || !selectedTime.value) return;

    const selectedDate = new Date(selectedDay.value);
    const [hours, minutes] = selectedTime.value.split(":").map(Number);
    selectedDate.setHours(hours, minutes);

    if (props.scope === "start" && props.endDate) {
        const endDate = new Date(props.endDate);
        if (selectedDate > endDate) {
            errorMessage.value = "Start date cannot be later than end date.";
            showError.value = true;
            emit("validationError", true);
            return;
        }
    } else if (props.scope === "end" && props.startDate) {
        const startDate = new Date(props.startDate);
        if (selectedDate < startDate) {
            errorMessage.value = "End date cannot be earlier than start date.";
            showError.value = true;
            emit("validationError", true);
            return;
        }
    }

    showError.value = false;
    errorMessage.value = "";
    emit("validationError", false);
};

function selectDay(day: { month: number; timestamp: number }) {
    if (day.month === 0) {
        selectedDay.value = day.timestamp;

        // Create a new date object based on the selected day and current selected time
        const selectedDate = new Date(day.timestamp);
        const [hours, minutes] = selectedTime.value.split(":").map(Number);
        selectedDate.setHours(hours, minutes);

        // Emit startDate or endDate based on scope
        if (props.scope === "start") {
            updateStartDate(selectedDate);
        } else if (props.scope === "end") {
            updateEndDate(selectedDate);
        }

        // Validate the selection
        validateDates();
    }
}

// Ensure validation on time and external prop changes
watch([selectedTime, props.startDate, props.endDate], () => validateDates());
watch(model, () => validateDates());
// Watch selectedTime and selectedDay to update model independently
watch(selectedTime, () => {
    if (selectedDay.value) {
        updateModelWithTime(); // This will combine the selected day with the selected time.
        validateDates(); // Ensure to validate after changing.
    }
});

watch(selectedDay, () => {
    if (selectedDay.value) {
        updateModelWithTime();
        validateDates();
    }
});

function updateModelWithTime() {
    const fullDate = new Date(selectedDay.value);
    const [hours, minutes] = selectedTime.value.split(":").map(Number);
    fullDate.setHours(hours, minutes);
    model.value = fullDate;
}

const handleClickOutside = (event: Event) => {
    if (datePicker.value && !datePicker.value.contains(event.target as Node)) {
        calendarVisible.value = false;
    }
};

onMounted(() => {
    document.addEventListener("click", handleClickOutside);
    validateInput();
});

onBeforeUnmount(() => {
    document.removeEventListener("click", handleClickOutside);
});

const classes = {
    input: "py-3 font-light peer shadow-sm px-4 text-[1.15rem] lg:text-lg block text-gray-700 w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 placeholder:text-gray-500 placeholder:text-[1rem] disabled:pointer-events-none dark:bg-transparent dark:border-gray-600 dark:text-neutral-400 dark:placeholder-gray-500 dark:focus:ring-neutral-600",
    inputError:
        "py-3 px-4 block w-full peer border-red-500 rounded-lg text-sm focus:border-red-500 focus:ring-red-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400",
};
const inputClass = computed(() =>
    props.error ? classes.inputError : classes.input,
);
const describeBy = computed(() => `${props.id}-error`);
</script>

<template>
    <div
        id="date_picker"
        class="mx-auto text-xs relative top-15"
        ref="datePicker"
    >
        <div id="date_picker_input" class="mb-2">
            <label
                for="date"
                class="block text-gray-600 text-xs font-light mb-2"
                >{{ label }}</label
            >
            <div class="relative">
                <input
                    type="text"
                    id="date"
                    readonly
                    @click="toggleCalendar"
                    v-model="formattedDateTime"
                    :class="[inputClass]"
                    :placeholder="props.placeholder"
                    :required="props.required"
                />
                <SharedCommonIcon
                    :name="errorMessage ? 'error' : 'calendar'"
                    class="absolute top-5 right-3 size-4 pointer-events-none peer-focus:text-primary-500 text-gray-700"
                />
            </div>
        </div>
        <div
            id="date_picker_calendar"
            v-if="calendarVisible"
            class="min-h-fit w-72 absolute -left-4 sm:-left-10 z-50 shadow-lg overflow-hidden p-3 border-t-gray-50 border-t-[0.1px] bg-white dark:bg-gray-800 rounded-lg"
        >
            <div
                id="calendar_header"
                class="flex items-center justify-between mb-2 text-white"
            >
                <button
                    class="cal-btn bg-gray-100 dark:bg-gray-600 rounded p-1 text-gray-700 dark:text-white"
                    @click.prevent="changeMonth(-1)"
                >
                    &#x3C;
                </button>
                <span class="text-gray-700 text-sm dark:text-white"
                    >{{ getMonthStr(month) }} {{ year }}</span
                >
                <button
                    class="cal-btn bg-gray-100 dark:bg-gray-600 rounded p-1 text-gray-700 dark:text-white"
                    @click.prevent="changeMonth(1)"
                >
                    &#x3E;
                </button>
            </div>
            <div id="cal_days" class="grid grid-cols-7 gap-2 text-gray-500">
                <div v-for="day in days" :key="day" class="text-center">
                    <span class="font-medium">{{ day.slice(0, 2) }}</span>
                </div>
            </div>
            <div id="calendar_main" class="grid grid-cols-7 gap-2">
                <div
                    v-for="day in monthDetails"
                    :key="day.timestamp"
                    class="text-center rounded-lg cursor-pointer p-2"
                    :class="[
                        day.month === 0
                            ? 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white'
                            : 'text-gray-400',
                        day.timestamp === selectedDay &&
                            day.month === 0 &&
                            ' ring-2 ring-primary-300 text-primary-400 font-bold bg-primary-50',
                    ]"
                    @click="selectDay(day)"
                >
                    <span>{{ day.date }}</span>
                </div>
            </div>
            <div
                v-if="type === 'datetime'"
                class="mt-4 flex items-center gap-5 border-t pt-1"
            >
                <label
                    class="block whitespace-nowrap text-gray-400 text-xs font-light mb-2"
                    >Select Time:</label
                >
                <input
                    type="time"
                    v-model="selectedTime"
                    :class="[inputClass]"
                    class="bg-gray-200"
                />
            </div>
            <div
                v-if="errorMessage"
                class="text-red-500 text-center text-[0.6rem] mt-2"
            >
                {{ errorMessage }}
            </div>
        </div>
    </div>
</template>
