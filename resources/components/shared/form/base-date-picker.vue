<script setup lang="ts">
import { BaseDateInputProps } from "~/resources/interfaces/shared/form.interface";
import {
    MonthsFull as months,
    DaysFull as days,
} from "~/resources/utils/shared/date";

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

const currentYear = new Date().getFullYear();
const currentMonth = new Date().getMonth();

const isPastMonth = (year: number, month: number) => {
    if (props.disablePast) {
        return (
            year < currentYear || (year === currentYear && month < currentMonth)
        );
    } else return false;
};

const year = ref(new Date().getFullYear());
const month = ref(new Date().getMonth());
const selectedDay = ref<number | null>(null);
const selectedTime = ref("11:00");
const calendarVisible = ref(false);
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

watch([selectedDay, selectedTime], () => {
    if (selectedDay.value) {
        const fullDate = new Date(selectedDay.value);
        const [hours, minutes] = selectedTime.value.split(":").map(Number);
        fullDate.setHours(hours, minutes);
        model.value = fullDate;
    }
    validateDates();
});

const getMonthDetails = (year: number, month: number) => {
    const firstDay = new Date(year, month).getDay();
    const numberOfDays = new Date(year, month + 1, 0).getDate();
    return Array.from({ length: 42 }, (_, i) =>
        getDayDetails(i, firstDay, year, month, numberOfDays),
    );
};

const getDayDetails = (
    index: number,
    firstDay: number,
    year: number,
    month: number,
    numberOfDays: number,
) => {
    const date = index - firstDay;
    const actualDate =
        date < 0 ? numberOfDays + date : (date % numberOfDays) + 1;
    const timestamp = new Date(year, month, actualDate).getTime();
    return {
        date: actualDate,
        timestamp,
        month: date < 0 ? -1 : date >= numberOfDays ? 1 : 0,
    };
};

const monthDetails = computed(() => getMonthDetails(year.value, month.value));

const toggleCalendar = () => (calendarVisible.value = !calendarVisible.value);

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

const validateDates = () => {
    if (!selectedDay.value || !selectedTime.value) return;
    const selectedDate = new Date(selectedDay.value);
    const [hours, minutes] = selectedTime.value.split(":").map(Number);
    selectedDate.setHours(hours, minutes);

    if (
        props.scope === "start" &&
        props.endDate &&
        selectedDate > new Date(props.endDate)
    ) {
        errorMessage.value = "Start date cannot be later than end date.";
    } else if (
        props.scope === "end" &&
        props.startDate &&
        selectedDate < new Date(props.startDate)
    ) {
        errorMessage.value = "End date cannot be earlier than start date.";
    } else {
        errorMessage.value = "";
    }
    emit("validationError", !!errorMessage.value);
};

function selectDay(day: { month: number; timestamp: number }) {
    if (day.month === 0) {
        selectedDay.value = day.timestamp;
        validateDates();
        const selectedDate = new Date(day.timestamp);
        const [hours, minutes] = selectedTime.value.split(":").map(Number);
        selectedDate.setHours(hours, minutes);
        if (props.scope === "start") {
            emit("update:startDate", selectedDate);
        } else if (props.scope === "end") {
            emit("update:endDate", selectedDate);
        }
    }
}

onMounted(() => {
    document.addEventListener("click", handleClickOutside);
});

onBeforeUnmount(() => {
    document.removeEventListener("click", handleClickOutside);
});

const handleClickOutside = (event: Event) => {
    if (!datePicker.value?.contains(event.target as Node)) {
        calendarVisible.value = false;
    }
};

const datePicker = ref<HTMLElement | null>(null);

const classes = {
    input: "py-3 font-light peer cursor-pointer px-4 text-base  block text-gray-700 w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 placeholder:text-gray-500  disabled:pointer-events-none dark:bg-transparent dark:border-gray-600 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600",
    inputError:
        "py-3 px-4 block w-full cursor-pointer text-base text-red-500 peer border-red-500 rounded-lg text-sm focus:border-red-500 focus:ring-red-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400",
};
const inputClass = computed(() =>
    errorMessage.value ? classes.inputError : classes.input,
);
const describeBy = computed(() => `${props.id}-error`);
</script>

<template>
    <div ref="datePicker" class="relative">
        <div class="flex justify-between items-center">
            <label
                v-if="props.label"
                :for="props.id"
                class="block text-gray-500 lg:text-base mb-2 dark:text-gray-300"
            >
                {{ props.label }}
            </label>
        </div>
        <div class="relative">
            <input
                type="text"
                readonly
                @click="toggleCalendar"
                v-model="formattedDateTime"
                :class="inputClass"
                :placeholder="props.placeholder"
                :required="props.required"
                :error="errorMessage"
            />
            <SharedCommonIcon
                v-if="errorMessage"
                name="error"
                class="absolute h-5 right-3 top-3 text-red-500 pointer-events-none"
            />
            <SharedCommonIcon
                v-else
                name="calendar"
                class="absolute h-5 right-3 top-3 text-gray-500 pointer-events-none"
            />
        </div>
        <div
            :class="[
                'w-80 py-5   transition-all min-h-full duration-300  mt-1 absolute z-50 flex-col bg-white border shadow-lg rounded-xl  dark:bg-gray-900 dark:border-gray-700',
                calendarVisible
                    ? 'opacity-100  translate-y-0 pointer-events-auto'
                    : 'opacity-0 h-0 translate-y-5 pointer-events-none',
                ,
                scope == 'end' && 'sm:right-0',
            ]"
        >
            <div class="flex items-center justify-between px-2">
                <button
                    type="button"
                    class="size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none dark:text-gray-400 dark:hover:bg-gray-800"
                    aria-label="Previous"
                    @click.prevent="changeMonth(-1)"
                    :disabled="isPastMonth(year, month - 1)"
                >
                    <SharedCommonIcon
                        name="chevron"
                        stroke-width="0.2"
                        class="-rotate-90 h-5"
                    />
                </button>

                <div
                    class="col-span-3 flex text-sm justify-center items-center gap-x-1"
                >
                    <span> {{ months[month] }} / {{ year }} </span>
                </div>

                <button
                    class="size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none dark:text-gray-400 dark:hover:bg-gray-800"
                    aria-label="Next"
                    @click.prevent="changeMonth(1)"
                    :disabled="isPastMonth(year, month + 1)"
                >
                    <SharedCommonIcon
                        name="chevron"
                        stroke-width="0.2"
                        class="rotate-90 h-5"
                    />
                </button>
            </div>
            <div class="grid grid-cols-7 gap-2 pb-1.5 text-center px-2">
                <div
                    class="block text-center text-sm text-gray-500 dark:text-gray-500"
                    v-for="day in days"
                    :key="day"
                >
                    {{ day.slice(0, 2) }}
                </div>
            </div>
            <div class="grid grid-cols-7 gap-1 text-sm px-2">
                <div
                    v-for="day in monthDetails"
                    :disabled="day.month != 0"
                    :key="day.timestamp"
                    :class="[
                        day.month === 0
                            ? day.timestamp === selectedDay
                                ? 'bg-primary-500  dark:bg-secondary-700 text-white'
                                : 'hover:border-secondary-600 hover:text-secondary-600'
                            : 'opacity-40 pointer-events-none ',
                        ' size-8 flex justify-center items-center cursor-pointer border border-transparent  text-gray-800 rounded-full  disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-primary-600 focus:text-primary-600 dark:text-gray-200',
                    ]"
                    @click="selectDay(day)"
                >
                    {{ day.date }}
                </div>
            </div>
            <div
                class="py-3 flex justify-center items-center gap-x-2"
                v-if="props.type === 'datetime'"
            >
                <SharedFormBaseTimePicker v-model="selectedTime" />
            </div>
            <div
                v-if="errorMessage"
                class="text-red-500 text-sm p-2 text-center"
            >
                {{ errorMessage }}
            </div>
            <div
                class="py-3 px-4 flex items-center justify-end gap-x-2 border-t border-gray-200 dark:border-gray-700"
            >
                <button
                    @click="toggleCalendar"
                    type="button"
                    class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-secondary-300 dark:bg-secondary-700 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-primary-500"
                >
                    Apply
                </button>
            </div>
        </div>
    </div>
</template>
