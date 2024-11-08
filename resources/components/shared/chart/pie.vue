<script setup lang="ts">
interface PieChartData {
    value: number;
    label: string;
}

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
        const color = blueShades[index % blueShades.length];
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
            class="aspect-square rounded-full w-full flex justify-center items-center mb-6"
        >
            <div class="aspect-square bg-white dark:bg-gray-800 rounded-full w-1/2"></div>
        </div>

        <!-- Legend below pie chart -->
        <!-- <div class="w-full grid grid-cols-2  gap-2">
      <div
        v-for="(item, index) in props.data"
        :key="index"
        class="flex items-center gap-2 text-xs"
      >
        <span
          class="w-4 h-4 rounded"
          :style="{ backgroundColor: blueShades[index % blueShades.length] }"
        ></span>
        <div>
              <span class="font-semibold">{{ item.label }}:</span>
        <span>{{ item.value }} ({{ ((item.value / total) * 100).toFixed(2) }}%)</span>

        </div>
     </div>
    </div> -->
    </div>
</template>
