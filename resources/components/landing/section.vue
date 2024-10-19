<script setup lang="ts">
const props = defineProps<{ title: string; description: string }>();
</script>

<template>
    <section
        :id="title.toLowerCase"
        class="bg-white py-8 flex flex-col gap-8 place-content-center scroll-mt-20"
    >
        <div class="flex px-8 flex-col md:items-center gap-2 py-4">
            <div class="font-black font-sans text-2xl sm:text-3xl">
                {{ title }}
            </div>
            <span
                class="text-gray-700 block md:text-center lg:w-[50rem] text-balance"
                >{{ description }}</span
            >
        </div>

        <div class="">
            <slot />
        </div>
    </section>
</template>
