<script setup lang="ts">
import { ProgressBarProps } from "~/resources/interfaces/shared/common.interface";

const props = withDefaults(defineProps<ProgressBarProps>(), {
    width: "100%",
    height: "8px",
    loadedClass: "bg-secondary-300 dark:bg-secondary-500",
    unloadedClass: "bg-gray-200 dark:bg-gray-700 w-full",
    total: 100,
    progress: 10,
    hideCountProgress: false, // Add a default for hideCountProgress
});

const computedProgress = computed(() => {
    return props.total
        ? ((props.progress / props.total) * 100).toFixed(2)
        : "0";
});
</script>

<template>
    <div class="grow flex flex-col space-y-1">
        <div class="flex text-sm justify-between py-1" v-if="props.title">
            <p class="font-semibold">{{ props.title }}</p>
            <p v-if="!props.hideCountProgress">{{ computedProgress }}%</p>
        </div>
        <div
            class="flex rounded-full overflow-hidden"
            :class="props.unloadedClass"
            :style="{ height: props.height, width: props.width }"
            role="progressbar"
            :aria-valuenow="computedProgress"
            aria-valuemin="0"
            aria-valuemax="100"
        >
            <div
                :class="[
                    'flex flex-col transition-all justify-center rounded-full duration-500',
                    props.loadedClass,
                ]"
                :style="{ width: `${computedProgress}%` }"
            ></div>
        </div>
    </div>
</template>
