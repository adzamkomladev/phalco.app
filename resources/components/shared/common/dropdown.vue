<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount } from "vue";

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
</script>

<template>
    <div class="relative group">
        <button @click="toggleDialog">
            <slot name="toggle">button</slot>
        </button>

        <dialog
            ref="dialogRef"
            class="top-full mt-1 bg-transparent max-h-screen dark:border transition-opacity"
        >
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
