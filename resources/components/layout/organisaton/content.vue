<script setup lang="ts">
const props = defineProps<{
    subtitle?: string;
    description?: string;
}>();

const subtitle = ref(props.subtitle);
const description = ref(props.description);
</script>

<template>
    <div class="self-end portrait:pt-0 tall:pt-8 xtall:pt-16 md:text-sm">
        <div
            class="text-center sm:landscape:text-left pb-6 portrait:flex flex-col items-center"
        >
            <p
                class="text-black dark:text-primary-700 font-black text-2xl md:text-3xl lg:text-4xl pb-4"
            >
                Organisation
            </p>

            <div class="felx flex-col gap-4">
                <p v-if="subtitle" class="text-lg dark:text-gray-300 font-bold lg:text-xl">
                    {{ subtitle }}
                </p>
                <p v-if="description" class="text-sm dark text-gray-400 lg:text-base opacity-80">
                    {{ description }}
                </p>
            </div>
        </div>
        <slot />
    </div>
</template>
