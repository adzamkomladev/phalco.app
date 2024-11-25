<script setup lang="ts">
import { ProgressBarProps } from "~/resources/interfaces/shared/common.interface";

const props = withDefaults(defineProps<ProgressBarProps>(), {
    width: "bg-secondary-500",
    loadedClass: " ",
    unloadedClass: " w-full ",
    total: 100,
    color: "#03045E",
    index: 1,
});

const colors = ["#03045E", "#023E8A", "#0077B6", "#0096C7"];
const computedProgress = computed(() => {
    return props.total ? ((props.progress / props.total) * 100).toFixed(2) : 0;
});
</script>

<template>
    <div :class="['flex items-center gap-2   h-12  ', unloadedClass]">
        <div
            :class="[
                ' flex flex-col transition-all font-medium  pl-5 rounded-r-md justify-center h-full  overflow-hidden duration-500 ',
                loadedClass,
            ]"
            :style="{
                width: `${computedProgress}%`,
                background: colors[index],
            }"
        >
            <p class="text-white">{{ title }}</p>
        </div>
        <div class="flex text-sm justify-between py-1">
            <p class="text-lg">{{ progress }} votes</p>
        </div>
    </div>
</template>
