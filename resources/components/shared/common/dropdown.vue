<script setup lang="ts">
const props = defineProps<{
    position?:
        | "top-right"
        | "top-left"
        | "top-center"
        | "bottom-right"
        | "bottom-left"
        | "bottom-center";
}>();

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
        "mt-2",
    ];

    switch (props.position) {
        case "top-right":
            return [...baseStyles, "absolute bottom-full right-0 mb-2"];
        case "top-left":
            return [...baseStyles, "absolute bottom-full left-0 mb-2"];
        case "top-center":
            return [
                ...baseStyles,
                "absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2",
            ];
        case "bottom-right":
            return [...baseStyles, "absolute  right-0 mt-2"];
        case "bottom-left":
            return [...baseStyles, "absolute  left-0 mt-2"];
        case "bottom-center":
            return [
                ...baseStyles,
                "absolute  left-1/2 transform -translate-x-1/2 mt-2",
            ];
        default:
            return baseStyles;
    }
});
</script>

<template>
    <div class="relative group">
        <button @click.prevent="toggleDialog">
            <slot name="toggle">button</slot>
        </button>

        <dialog ref="dialogRef" :class="positionStyle">
            <transition name="fade" mode="out-in">
                <div v-if="isVisible" class="">
                    <slot>content</slot>
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
