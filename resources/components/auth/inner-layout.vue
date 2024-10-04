<script setup lang="ts">
const props = defineProps<{
    title?: string;
    description?: string;
}>();

// If no message is passed, we assign the default here
const title = props.title || "Login";
const description = props.description;
</script>

<template>
    <div class="self-end">
        <div class="py-5 text-center sm:text-left">
            <p
                class="text-primary-500 dark:text-primary-700 font-extrabold text-2xl"
            >
                {{ title }}
            </p>
            <p class="text-gray-500 font-normal">{{ description }}</p>
        </div>

        <slot />
    </div>
</template>
