<script setup lang="ts">
import { Stage } from "~/resources/interfaces/elections/selected.interface";

const props = defineProps<{ stage: Stage; index: number; length: number }>();
import { formatDate } from "~/resources/utils/shared/date";

const isPast = new Date() > new Date(props?.stage?.end);

const isOngoing =
    props?.stage?.start && props?.stage?.end
        ? new Date(props.stage.start) <= new Date() &&
          new Date() <= new Date(props.stage.end)
        : false;
</script>

<template>
    <div
        v-motion-fade-visible
        :delay="50 * index"
        class="grid grid-cols-7 gap-x-5 ms-1"
        :class="length == index + 1 && 'grow'"
    >
        <div
            class="text-xs pt-2 col-span-3"
            :class="isPast ? 'text-forest dark:text-gray-100 font-medium' : ''"
        >
            <span
                :class="
                    new Date(stage.start) <= new Date() && !isPast
                        ? 'text-primary dark:text-gray-100 font-medium'
                        : ''
                "
                >{{ formatDate(stage.start, "dd/mm/yy") }}</span
            >
            <span> - {{ formatDate(new Date(stage.end), "dd/mm/yy") }}</span>
        </div>
        <div
            :class="[
                isPast
                    ? 'after:bg-forest-300 dark:after:bg-forest-600'
                    : 'after:bg-gray-300 dark:after:bg-gray-400',
            ]"
            class="relative last:after:hidden col-span-1 after:absolute after:top-8 after:bottom-0 flex justify-center after:w-px after:-translate-x-[0.5px]"
        >
            <div
                class="relative z-10 size-8 aspect-square flex justify-center items-center"
            >
                <span
                    :class="[
                        isPast
                            ? 'bg-forest-300 dark:bg-forest-600 '
                            : !isOngoing && 'bg-gray-300 dark:bg-gray-500',
                        isOngoing
                            ? 'animate-ping size-4 bg-primary-300 dark:bg-primary'
                            : 'size-3 ',
                    ]"
                    class="rounded-full"
                />
                <span
                    class="size-3 absolute bg-primary-500 dark:bg-primary rounded-full"
                    v-if="isOngoing"
                />
            </div>
        </div>
        <!-- :delay="60 * index * index" -->

        <div class="pt-1 col-span-3 pb-8 sm:pb-12 overflow-hidden">
            <div
                class=""
                v-motion-pop-visible-once
                :duration="200"
                :delay="100 * index"
            >
                <p>{{ stage.stage }}</p>
                <p class="opacity-0">g</p>
            </div>
        </div>
        <!-- :delay="50 * index * index" -->
    </div>
</template>
