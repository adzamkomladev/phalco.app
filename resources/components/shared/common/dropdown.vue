<script setup lang="ts">
import { DropDown } from "~/resources/interfaces/shared/common.interface";

const props = defineProps<DropDown>();

const emits = defineEmits(["toggle"]);

const dialogRef = ref<HTMLDialogElement | null>(null);
const isVisible = ref(false);

const toggleDialog = () => {
    if (dialogRef.value) {
        if (isVisible.value) {
            isVisible.value = false;
            setTimeout(() => dialogRef.value?.close(), 300);
            document.removeEventListener("click", handleClickOutside);
        } else {
            dialogRef.value.show();
            isVisible.value = true;
            setTimeout(
                () => document.addEventListener("click", handleClickOutside),
                0,
            );
        }
        emits("toggle", isVisible.value);
    }
};

const hideOnContentClick = () => {
    if (props.hideContentOnSelect) {
        toggleDialog();
    }
};

const handleClickOutside = (event: MouseEvent) => {
    if (dialogRef.value && !dialogRef.value.contains(event.target as Node)) {
        toggleDialog();
    }
};

onBeforeUnmount(() => {
    document.removeEventListener("click", handleClickOutside);
});

const positionStyle = computed(() => {
    const baseStyles = [
        "bg-transparent",
        "max-h-screen",
        "dark:border",
        "transition-opacity",
        "mt-1  ",
    ];

    switch (props.position) {
        case "top-right":
            return [...baseStyles, "absolute bottom-full right-0 mb-1"];
        case "top-left":
            return [...baseStyles, "absolute bottom-full left-0 mb-1"];
        case "top-center":
            return [
                ...baseStyles,
                "absolute bottom-full left-1/2 transform -translate-x-1/2 mb-1",
            ];
        case "bottom-right":
            return [...baseStyles, "absolute right-0 mt-1"];
        case "bottom-left":
            return [...baseStyles, "absolute left-0 mt-1"];
        case "bottom-center":
            return [
                ...baseStyles,
                "absolute left-1/2 transform -translate-x-1/2 top-full mt-1",
            ];
        default:
            return baseStyles;
    }
});
</script>

<template>
    <div class="relative flex group">
        <button @click.prevent="toggleDialog" :class="buttonClass">
            <slot name="toggle" class="grow flex">button</slot>
        </button>

        <dialog
            ref="dialogRef"
            class="border-none border-transparent w-full"
            :class="[positionStyle, dialogClass]"
        >
            <transition name="fade" mode="out-in">
                <div
                    @click.prevent="hideOnContentClick"
                    v-if="isVisible"
                    class="w-full"
                >
                    <slot></slot>
                </div>
            </transition>
        </dialog>
    </div>
</template>

<style scoped>
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: translateY(1rem);
}
.fade-enter-active,
.fade-leave-active {
    transition: all 0.15s ease-out;
}
</style>
