<script setup lang="ts">
import { HSOverlay } from "preline/preline";

const props = defineProps<{ title: string; size: string; maxSize: string }>();

const sizeClass = computed(() => `max-w-${props.maxSize} lg:w-${props.size}`);

const { show, close, unmount } = useDialog();

const overlay = ref<HTMLElement | null>(null);
const overlayHandler = ref<any | null>(null);

onMounted(() => {
    HSOverlay.autoInit();

    const { element } = HSOverlay.getInstance(overlay.value!, true) as any;
    overlayHandler.value = element;

    overlayHandler.value.open();

    // overlayHandler.value.on("open", (_: any) => console.log("We are open"));
    overlayHandler.value.on("close", (_: any) => {
        close();
        unmount();
    });
});

watch(show, (newShow: boolean | undefined, _: boolean | undefined) => {
    if (newShow === undefined) return;

    newShow ? overlayHandler.value?.open() : overlayHandler.value?.close();
});
</script>

<template>
    <div
        ref="overlay"
        :class="sizeClass"
        id="base-overlay"
        class="hs-overlay hs-overlay-open:translate-x-0 hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full z-[80] bg-white border-e dark:bg-neutral-800 dark:border-neutral-700"
        role="dialog"
        tabindex="-1"
        aria-labelledby="base-overlay-label"
    >
        <div
            class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700"
        >
            <h3
                id="base-overlay-label"
                class="font-bold text-gray-800 dark:text-white"
            >
                {{ props.title }}
            </h3>
            <button
                type="button"
                class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                aria-label="Close"
                data-hs-overlay="#base-overlay"
            >
                <span class="sr-only">Close</span>
                <svg
                    class="shrink-0 size-4"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-4">
            <p class="text-gray-800 dark:text-neutral-400">
                <!-- Some text as placeholder. In real life you can have the elements
                you have chosen. Like, text, images, lists, etc. -->
            </p>
            <slot />
        </div>
    </div>
</template>
