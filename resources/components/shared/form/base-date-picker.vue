<script setup lang="ts">
import {
    ref,
    computed,
    onMounted,
    onBeforeUnmount,
    watch,
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

const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

const year = ref(new Date().getFullYear());
const month = ref(new Date().getMonth());
const selectedDay = ref<number | null>(null);
const selectedTime = ref("12:00");
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
    return Array.from({ length: 42 }, (_, i) => getDayDetails(i, firstDay, year, month, numberOfDays));
};

const getDayDetails = (index: number, firstDay: number, year: number, month: number, numberOfDays: number) => {
    const date = index - firstDay;
    const actualDate = date < 0 ? numberOfDays + date : (date % numberOfDays) + 1;
    const timestamp = new Date(year, month, actualDate).getTime();
    return { date: actualDate, timestamp, month: date < 0 ? -1 : date >= numberOfDays ? 1 : 0 };
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

    if (props.scope === "start" && props.endDate && selectedDate > new Date(props.endDate)) {
        errorMessage.value = "Start date cannot be later than end date.";
    } else if (props.scope === "end" && props.startDate && selectedDate < new Date(props.startDate)) {
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
        />
        <SharedCommonIcon :name="errorMessage ? 'error' : 'calendar'" class="absolute right-3 top-2" />

        <div v-if="calendarVisible" class="absolute z-50 w-72 bg-white shadow-lg">
            <div class="flex items-center justify-between">
                <button @click="changeMonth(-1)">&lt;</button>
                <span>{{ months[month] }} {{ year }}</span>
                <button @click="changeMonth(1)">&gt;</button>
            </div>
            <div class="grid grid-cols-7 gap-2">
                <div v-for="day in days" :key="day">{{ day.slice(0, 2) }}</div>
            </div>
            <div class="grid grid-cols-7 gap-2">
                <div
                    v-for="day in monthDetails"
                    :key="day.timestamp"
                    :class="day.month === 0 ? 'bg-gray-200' : 'text-gray-400'"
                    @click="selectDay(day)"
                >
                    {{ day.date }}
                </div>
            </div>
            <div v-if="props.type === 'datetime'">
                <SharedFormBaseTimePicker v-model="selectedTime" />
                <input type="time" v-model="selectedTime" class="bg-gray-200" />
            </div>
            <div v-if="errorMessage" class="text-red-500 text-xs">{{ errorMessage }}</div>
        </div>
    </div>
</template>
