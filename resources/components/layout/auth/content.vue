<script setup lang="ts">
const props = defineProps<{
    title?: string;
    description?: string;
}>();

const title = props.title || "Auth";
const description = props.description;
</script>

<template>
    <div class="self-end ">
        <div v-if="props.title" class="text-center sm:landscape:text-left">
            <p
                class="text-black dark:text-primary-700 font-black text-2xl sm:text-3xl 2xl:text-4xl"
            >
            {{title}}
            </p>
            <p v-if="props.description" class="pb-4 text-gray-500 font-normal text-base md:text-lg">{{ description }}</p>
        </div>

        <slot />
    </div>
</template>
