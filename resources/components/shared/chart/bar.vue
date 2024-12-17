<script setup lang="ts">
import {
    BarChatProps,
    Data,
} from "~/resources/interfaces/chats/index.interface";

const props = withDefaults(defineProps<BarChatProps>(), {
    defaultColor: "#07689F",
    unit: "$",
    values: () => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    labels: () => [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
    ],
    colors: () => [],
});

const values = computed(
    () => props.data?.map((item: Data) => item.value) || props.values,
);
const labels = computed(
    () => props.data?.map((item: Data) => item.label) || props.labels,
);

const colors = computed(() =>
    props.colors.length > 0
        ? props.colors
        : new Array(values.value.length).fill(props.defaultColor),
);

const maxFrequency = computed(() => {
    const maxValue = Math.max(...values.value, 500);
    return maxValue > 0 ? maxValue : 500;
});
</script>

<template>
    <div
        class="chart-wrapper flex items-end justify-between w-full h-60 max-w-lg mx-auto relative"
    >
        <!-- Y-axis labels -->
        <div
            class="flex flex-col justify-between h-[calc(100%+1rem)] w-full absolute left-0 bottom-0"
        >
            <div
                v-for="y in 6"
                :key="y"
                class="text-xs flex items-center font-medium text-gray-500"
            >
                <div>
                    {{
                        (maxFrequency - ((y - 1) * maxFrequency) / 5).toFixed(2)
                    }}
                </div>
                <div
                    class="w-full grow border-b-[1px] dark:border-gray-700 self-end"
                ></div>
            </div>
        </div>
        <!-- Chart Container -->
        <div
            class="chart-container flex items-end justify-between w-full h-full relative pl-8"
        >
            <div
                v-for="(item, index) in values"
                :key="index"
                :style="{ height: `${(item / maxFrequency) * 100}%` }"
                class="bar-container h-full w-full flex flex-col items-center group relative"
            >
                <span
                    class="transition-all text-nowrap -translate-y-full absolute text-xs -top-6 opacity-0 group-hover:opacity-100"
                >
                    {{ props.unit }} {{ item }}
                </span>
                <div
                    :style="{ backgroundColor: colors[index] }"
                    class="bar w-[50%] grow rounded-t transition-all duration-300 ease-in-out"
                ></div>
                <span
                    class="text-xs capitalize font-medium mt-4 md:text-[0.6rem] xl:text-xs absolute top-full text-gray-500"
                >
                    {{ labels[index] }}
                </span>
            </div>
        </div>
    </div>
</template>

<style scoped>
.chart-wrapper {
    max-width: 100%;
}

.bar-container:hover .bar {
    transform: scaleY(1.1);
}
</style>
