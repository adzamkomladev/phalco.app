<script setup lang="ts">
import { ProgressBarProps } from "~/resources/interfaces/common/index.interface";

const props = withDefaults(defineProps<ProgressBarProps>(), {
    width: "100%",
    height: "8px",
    loadedClass: "bg-secondary-300 dark:bg-secondary-500 ",
    unloadedClass: "bg-gray-200 dark:bg-gray-700 w-full h-3 ",
    total: 100,
});

const computedProgress = computed(() => {
    return props.total ? ((props.progress / props.total) * 100).toFixed(2) : 0;
});
</script>

<template>
    <div>
        <div class="flex text-sm justify-between py-1">
            <p class="font-semibold">{{ title }}</p>
            <p class="">{{ computedProgress }}%</p>
        </div>
        <div
            :class="['flex   rounded-full overflow-hidden  ', unloadedClass]"
            role="progressbar"
            aria-valuenow="25"
            aria-valuemin="0"
            aria-valuemax="100"
        >
            <div
                :class="[
                    ' flex flex-col transition-all justify-center rounded-full overflow-hidden duration-500 ',
                    loadedClass,
                ]"
                :style="{ width: `${computedProgress}%` }"
            ></div>
        </div>
    </div>
</template>
