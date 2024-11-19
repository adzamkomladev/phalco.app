<script setup lang="ts">
import { PieChartData } from "~/resources/interfaces/chats/index.interface";

const props = defineProps<{ data: PieChartData[] }>();

const blueShades = [
    "#EFF6FFdd",
    "#DBEAFEdd",
    "#BFDBFEdd",
    "#93C5FDdd",
    "#60A5Fdda",
    "#3B82F6dd",
    "#2563EBdd",
    "#1D4ED8dd",
    "#1E40AFdd",
    "#1E3A8dda",
];

const total = computed(() =>
    props.data.reduce((sum: number, item: PieChartData) => sum + item.value, 0),
);

const conicStyle = computed(() => {
    let degreeStart = 0;
    const segments = props.data.map((item: PieChartData, index: number) => {
        const percentage = (item.value / total.value) * 100;
        const degree = (percentage / 100) * 360;
        const color = item.color || blueShades[index % blueShades.length];
        const segmentStyle = `${color} ${degreeStart}deg ${degreeStart + degree}deg`;
        degreeStart += degree;
        return segmentStyle;
    });

    return {
        background: `conic-gradient(${segments.join(", ")})`,
    };
});
</script>

<template>
    <div
        v-motion-pop-visible-once
        :delay="210"
        class="flex flex-col items-center"
    >
        <div
            v-motion-fade-visible
            :delay="100"
            :duration="210"
            :style="conicStyle"
            class="aspect-square shadow-card rounded-full w-full flex justify-center items-center mb-6"
        >
            <div
                class="aspect-square text-primary-300 bg-white dark:bg-gray-800 rounded-full w-1/4"
            ></div>
        </div>
    </div>
</template>
