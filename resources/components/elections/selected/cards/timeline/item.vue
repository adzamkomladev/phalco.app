<script setup lang="ts">
import { ElectionStageProps } from "~/resources/interfaces/elections/create.interface";

const props = defineProps<{ stage: ElectionStageProps; index: number }>();

const formatDate = (dateString: Date | null) => {
    if (!dateString) return "";

    const date = new Date(dateString);

    return date.toLocaleDateString("en-GB", {
        day: "2-digit",
        month: "2-digit",
        year: "2-digit",
    });
};

const isPast = new Date() > props?.stage?.date?.end;
const isOngoing =
    props?.stage?.date?.start < new Date() && new Date() < props.stage.date.end;
</script>

<template>
    <div
        v-motion-fade-visible
        :delay="50 * index"
        class="grid grid-cols-7 gap-x-5 ms-1"
    >
        <div class="text-xs col-span-2">{{ formatDate(stage.date.start) }}</div>

        <div
            :class="[isPast ? 'after:bg-crimson-300 dark:after:bg-crimson-600' : 'after:bg-gray-300 dark:after:bg-gray-400']"
            class="relative last:after:hidden col-span-1 after:absolute after:top-8 after:bottom-0 flex justify-center after:w-px after:-translate-x-[0.5px]"
        >
            <div class="relative z-10 size-8 flex justify-center items-center">
                <span
                    :class="[
                        isPast ? 'bg-crimson-300 dark:bg-crimson-600' : !isOngoing && 'bg-gray-300 dark:bg-gray-500',
                        isOngoing
                            ? 'animate-ping size-4 bg-forest-200 dark:bg-forest'
                            : 'size-3 ',
                    ]"
                    class="rounded-full"
                />
                <span
                    class="size-3 absolute bg-forest-300 dark:bg-forest-700 rounded-full"
                    v-if="isOngoing"
                />
            </div>
        </div>
        <!-- :delay="60 * index * index" -->

        <div class="grow pt-0.5 col-span-4 pb-8 sm:pb-12 overflow-hidden">
            <div
                class=""
                v-motion-pop-visible-once
                :duration="200"
                :delay="100 * index"
            >
                <p>{{ stage.title }}</p>
                <p class="text-xs text-gray-500">Get info about election</p>
            </div>
        </div>
        <!-- :delay="50 * index * index" -->
    </div>
</template>
