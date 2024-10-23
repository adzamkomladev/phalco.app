<script setup lang="ts">
const props = defineProps<{ content?: string }>();
</script>

<template>
    <div
        class="py-5 _sm:py-3 _md:landscape:py-3 flex items-center px-3 text-gray-300 text-sm sm:text-lg before:flex-1 before:border-t-2 before:border-gray-400 before:me-4 after:flex-1 after:border-t-2 after:border-gray-400 after:ms-4 dark:text-gray-500 dark:before:border-gray-600 dark:after:border-gray-600"
    >
        {{ content ? content : "or" }}
    </div>
</template>
