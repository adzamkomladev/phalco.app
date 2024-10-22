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
    <div class="group" v-motion-fade-visible :duration="360" :delay="200">
        <div
            :style="{ backgroundColor: service.icon.color + 60 }"
            v-motion-pop-visible-once
            :delay="90 * index"
            :duration="410"
            class="rounded-xl p-4 group flex flex-col md:w-24 md:h-24 aspect-square items-center justify-center text-center"
        >
            <div
                class="aspect-square flex items-center md:group-hover:scale-105 transition-all duration-300 justify-center"
            >
                <SharedCommonIcon
                    class="h-24 w-24 sm:h-36 sm-w-36 md:h-10 transition-all group-hover:scale-105"
                    :name="service.icon.name"
                    :color="service.icon.color"
                />
            </div>

            <p class="font-bold md:hidden">{{ service.title }}</p>
        </div>
        <div class="hidden mt-4 md:block bg-clip-text">
            <p
                class="font-bold text-2xl pb-2 group-hover:bg-clip-text group-hover:text-transparent bg-clip-text transition-colors duration-300"
                v-motion-pop
                :style="{ backgroundColor: service.icon.color }"
                :delay="index * 60 + 500"
            >
                {{ service.title }}
            </p>

            <p
                class="text-lg text-pretty duration-300 text-gray-600 group group-hover:bg-clip-text group-hover:text-transparent bg-clip-text transition-colors"
                v-motion-pop
                :delay="index * 60 + 800"
                :duration="360"
                :style="{ backgroundColor: service.icon.color }"
            >
                {{ service.description }}
            </p>
        </div>
    </div>
</template>
