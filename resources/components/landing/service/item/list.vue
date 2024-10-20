<script setup lang="ts">
const props = defineProps<{
    service: {
        title: string;
        description: string;
        icon: { name: string; color: string };
    };
    index: number;
}>();
</script>

<template>
    <div class="group">
        <div
            :style="{ backgroundColor: service.icon.color + 60 }"
            v-motion-pop-visible
            :initial="{ opacity: 0, scale: 0.5 }"
            :enter="{ opacity: 1, scale: 1 }"
            :delay="60 * index"
            class="rounded-xl p-4 group flex flex-col md:w-fit aspect-square items-center justify-center text-center"
        >
            <div class="aspect-square flex items-center justify-center">
                <SharedCommonIcon
                    class="h-28 w-28 sm:h-36 sm-w-36 md:h-20 md:w-20 transition-all group-hover:scale-105"
                    :name="service.icon.name"
                    :color="service.icon.color"
                />
            </div>

            <p class="font-bold md:hidden">{{ service.title }}</p>
        </div>
        <div class="hidden md:block bg-clip-text">
            <p
                class="font-bold text-2xl text-bala group-hover:bg-clip-text group-hover:text-transparent bg-clip-text transition-colors"
                v-motion-pop
                :style="{ backgroundColor: service.icon.color }"
                :delay="index * 60 + 500"
            >
                {{ service.title }}
            </p>

            <p
                class="text-lg text-pretty text-gray-600 group group-hover:bg-clip-text group-hover:text-transparent bg-clip-text transition-colors"
                v-motion-pop
                :delay="index * 60 + 800"
                :style="{ backgroundColor: service.icon.color }"
            >
                {{ service.description }}
            </p>
        </div>
    </div>
</template>
