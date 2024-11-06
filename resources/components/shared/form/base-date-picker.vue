<script setup lang="ts">
import { BaseDateInputProps } from "~/resources/interfaces/shared/form.interface";

const props = withDefaults(defineProps<BaseDateInputProps>(), {
    id: `input-${Math.random() * 1000}`,
    type: "date",
    placeholder: "",
    required: true,
    autocomplete: "on",
    scope: "general",
    default: "datetime",
    // farthestDate: disablePast:true ?;
});

const model = defineModel({ required: true });
const emit = defineEmits([
    "update:startDate",
    "update:endDate",
    "validationError",
]);

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
    <div ref="datePicker" class="relative">
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
            :name="errorMessage ? 'error' : 'calendar'"
            class="absolute h-5 right-3 top-3 text-gray-700"
        />

        <div
            :class="[
                'w-80 py-5  px-2 transition-all min-h-full duration-300 -left-10 mt-2 absolute z-50 flex-col bg-white border shadow-lg rounded-xl  dark:bg-neutral-900 dark:border-neutral-700',
                calendarVisible
                    ? 'opacity-100  translate-y-0 pointer-events-auto'
                    : 'opacity-0 h-0 translate-y-5 pointer-events-none',
            ]"
        >
            <div class="flex items-center justify-between">
                <button
                    type="button"
                    class="size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    aria-label="Previous"
                    @click.prevent="changeMonth(-1)"
                    :disabled="isPastMonth(year, month - 1)"
                >
                    &lt;
                </button>

                <div
                    class="col-span-3 flex justify-center items-center gap-x-1"
                >
                    <span> {{ months[month] }} / {{ year }} </span>
                </div>

                <button
                    class="size-8 justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    aria-label="Next"
                    @click.prevent="changeMonth(1)"
                    :disabled="isPastMonth(year, month + 1)"
                >
                    &gt;
                </button>
            </div>
            <div class="grid grid-cols-7 gap-2 pb-1.5">
                <div
                    class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500"
                    v-for="day in days"
                    :key="day"
                >
                    {{ day.slice(0, 2) }}
                </div>
            </div>
            <div class="grid grid-cols-7 gap-2">
                <div
                    v-for="day in monthDetails"
                    :disabled="day.month != 0"
                    :key="day.timestamp"
                    :class="[
                        day.month === 0
                            ? day.timestamp === selectedDay
                                ? 'bg-blue-500 text-white'
                                : 'hover:border-blue-600 hover:text-blue-600'
                            : 'opacity-40 pointer-events-none ',
                        ' size-8 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full  disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200',
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
            <div v-if="errorMessage" class="text-red-500  text-sm p-2 text-center">
                {{ errorMessage }}
            </div>
   <div class="py-3 px-4 flex items-center justify-end gap-x-2 border-t border-gray-200 dark:border-neutral-700">

      <button             @click="toggleCalendar"
  type="button" class="py-2 px-3  inline-flex justify-center items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500">
        Apply
      </button>
    </div>
        </div>
    </div>
</template>
