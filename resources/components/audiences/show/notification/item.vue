<script setup lang="ts">
import { ref, computed } from "vue";

interface EventProps {
    id: number;
    title: string;
    progress: number;
    total: number;
    status: "uploading" | "completed" | "failed" | "canceled";
    url: string;
}

const props = defineProps<{
    event: EventProps;
}>();

const emit = defineEmits<{
    (e: "stop", id: number): void;
}>();

// Computed status flags
const isUploading = computed(() => props.event.status === "uploading");
const isCompleted = computed(() => props.event.status === "completed");
const isFailed = computed(
    () => props.event.status === "failed" || props.event.status === "canceled",
);

// Handle "Stop" action
const handleStop = async () => {
    try {
        const response = await fetch(props.event.url, {
            method: "POST",
            body: JSON.stringify({ action: "stop", id: props.event.id }),
        });

        if (response.ok) {
            emit("stop", props.event.id);
        } else {
            console.error("Failed to stop the event.");
        }
    } catch (error) {
        console.error("Error performing stop action:", error);
    }
};
</script>

<template>
    <div
        class="p-4 flex gap-2 rounded-md hover:bg-gray-50 hover:dark:bg-gray-900 m-2 transition-all"
    >
        <div>
            <img
                src="https://via.placeholder.com/150"
                class="size-12 rounded-full bg-slate-50"
                alt="Event Thumbnail"
            />
        </div>
        <div class="grow grid gap-1">
            <div class="flex justify-between items-center">
                <p class="text-sm font-medium text-gray-800 dark:text-white">
                    {{ props.event.title }}
                </p>
                <button
                    v-if="isUploading"
                    @click="handleStop"
                    type="button"
                    class="relative text-gray-500 hover:scale-[1.2] transition-all hover:text-crimson-500 focus:outline-none"
                >
                    <SharedCommonIcon name="close" />
                    <span class="sr-only">Stop</span>
                </button>
            </div>
            <div
                class="text-xs text-gray-500 dark:text-neutral-500 flex justify-between w-full"
            >
                <div class="flex gap-2">
                    <p class="text-primary-500">
                        Progress {{ props.event.progress }}%
                    </p>
                    <p>{{ (props.event.total / 1024).toFixed(2) }} MB</p>
                </div>
                <p>{{ props.event.status }}</p>
            </div>
            <SharedCommonProgressBar
                :progress="props.event.progress"
                :total="props.event.total"
                height="6px"
                :unloaded-class="[
                    isFailed
                        ? 'bg-crimson-100'
                        : isCompleted
                          ? 'bg-teal-100'
                          : 'bg-gray-100',
                ]"
                :loaded-class="[
                    isFailed
                        ? 'bg-crimson-500'
                        : isCompleted
                          ? 'bg-teal-500'
                          : 'bg-primary-400',
                ]"
            />
        </div>
    </div>
</template>
