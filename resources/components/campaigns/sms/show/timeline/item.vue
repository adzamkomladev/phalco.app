<script setup lang="ts">
import { Stage } from "~/resources/interfaces/elections/show.interface";

const props = defineProps<{
    data: {
        status?: string;
        sender?: string;
        time?: string;
    };
    index: number;
    length: number;
}>();

const { status = "cancelled", sender = "Unknown", time = "" } = props.data;

import { formatDate } from "~/resources/utils/shared/date";
</script>

<template>
    <div
        v-motion-fade-visible
        :delay="50 * index"
        class="grid grid-cols-7 gap-x-5 ms-1"
        :class="length == index + 1 && 'grow'"
    >
        <div
            class="relative after:bg-gray-300 dark:after:bg-gray-600 last:after:hidden col-start-2 col-span-1 after:absolute after:top-8 after:bottom-0 flex justify-center after:w-px after:-translate-x-[0.5px]"
        >
            <div
                class="relative z-10 size-8 aspect-square flex justify-center items-center"
            >
                <span
                    :class="[
                        status === 'completed'
                            ? 'bg-forest-400  dark:after:bg-forest-600'
                            : status === 'sending'
                              ? 'bg-primary-400 dark:after:bg-primary-600'
                              : status === 'paused'
                                ? 'bg-gray-400 dark:after:bg-gray-400'
                                : 'bg-crimson-400 dark:after:bg-crimson-600',
                    ]"
                    class="rounded-full size-4"
                />
                <!-- <span
                    class="size-3 absolute bg-primary-500 dark:bg-primary rounded-full"
                    v-if="status === 'sending'"
                /> -->
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
                <p
                    :class="[
                        status === 'completed'
                            ? 'text-forest-400  dark:after:text-forest-600'
                            : status === 'sending'
                              ? 'text-primary-400 dark:after:text-primary-600'
                              : status === 'paused'
                                ? 'text-gray-400 dark:after:text-gray-400'
                                : 'text-crimson-400 dark:after:text-crimson-600',
                    ]"
                    class="text-sm font-semibold"
                >
                    {{ status }}
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ sender }}
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ time }}
                </p>
                <p class="opacity-0">g</p>
            </div>
        </div>
        <!-- :delay="50 * index * index" -->
    </div>
</template>
