<template>
    <div
        class="chart-wrapper flex items-end justify-between w-full h-60 max-w-lg mx-auto relative"
    >
        <!-- Y-axis labels -->

        <!-- Chart Container -->
        <div
            class="chart-container flex items-end justify-between w-full h-full relative pl-8"
        >
            <div
                class="flex flex-col justify-between h-[calc(100%_+_1rem)] w-full absolute left-0 bottom-0"
            >
                <div
                    v-for="y in 6"
                    :key="y"
                    class="text-xs w-full items-center flex font-medium text-gray-500"
                >
                    <div>
                        {{
                            (
                                maxFrequency -
                                ((y - 1) * maxFrequency) / 5
                            ).toFixed(2)
                        }}
                    </div>
                    <div
                        class="w-full grow border-b-[1px] dark:border-gray-700 self-end"
                    ></div>
                </div>
            </div>
            <div
                :style="{ height: `${(item / maxFrequency) * 100}%` }"
                v-for="(item, index) in values"
                :key="index"
                class="bar-container h-full w-full flex flex-col items-center group relative"
            >
                <span
                    class="transition-all -translate-y-full absolute text-xs -top-6 opacity-0 group-hover:opacity-100"
                >
                    ${{ item }}
                </span>
                <div
                    :style="{ backgroundColor: colors[index] || defaultColor }"
                    class="bar w-[50%] grow rounded-t transition-all duration-300 ease-in-out"
                ></div>
                <span
                    class="text-xs font-medium mt-4 md:text-[0.6rem] xl:text-xs absolute top-full text-gray-500"
                    >{{ labels[index] }}</span
                >
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { barChatProps } from "~/resources/interfaces/chats/index.interface";

const props = withDefaults(defineProps<barChatProps>(), {
    defaultColor: "#07689F",
});

const values = computed(() =>
    props.data ? props.data.map((item) => item.value) : props.values || [],
);
const labels = computed(() =>
    props.data ? props.data.map((item) => item.label) : props.labels || [],
);

const colors = computed(() => {
    if (props.colors && props.colors.length > 0) {
        return props.colors;
    } else {
        return new Array(props.values.length).fill(props.defaultColor);
    }
});

// Calculate the maximum value from the data to scale bars as percentages
const maxFrequency = computed(() => {
    return Math.max(...props.values) || 100; // Use the spread operator for computing max from an array
});
</script>

<style scoped></style>
