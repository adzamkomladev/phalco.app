<script setup lang="ts">
const props = defineProps<{ requirement: string; index: number }>();
</script>

<template>
    <div
    v-motion-fade-visible
    :duration="270"
    :delay="60"
    class="flex gap-x-5 ms-1">
        <div
            class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-gray-200"
        >
            <div class="relative z-10 size-8 flex justify-center items-center">
                <SharedCommonIcon
                    v-motion-pop-visible-once
                    :duration="210"
                    :delay="60 * index * index"
                    name="hexagon"
                    class=""
                />
            </div>
        </div>

        <div class="grow pt-0.5  text-gray-600 pb-8 sm:pb-12 overflow-hidden">
            <p
                class=""
                v-motion-slide-visible-once-right
                :duration="200"
                :delay="50 * index * index"
            >
                {{ requirement }}
            </p>
        </div>
    </div>
</template>
