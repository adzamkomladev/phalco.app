<script setup lang="ts">
const props = defineProps<{
    title?: string;
    description?: string;
}>();

const title = props.title || "Login";
const description = props.description;
</script>

<template>
    <div class="self-end ">
        <div class="pt-12 sm:landscape:py-5 n text-center sm:landscape:text-left">
            <p
                class="text-black dark:text-primary-700 font-black text-xl sm:text-4xl 2xl:text-4xl"
            >
            {{title}}
            </p>
            <p class="pb-4 text-gray-500 font-normal text-base md:text-lg">{{ description }}</p>
        </div>

        <slot />
    </div>
</template>
