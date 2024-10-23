<script setup lang="ts">
import { HSOverlay } from "preline/preline";

const props = defineProps<{ title: string;subtitle:string;description:string;useSheet:boolean;pageImage:string; size: string; maxSize?: string }>();

const sizeClass = computed(
    () => `max-w-${props.size} w-${props.maxSize || "full"}`,
);

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
        id="base-overlay"
        class="hs-overlay text-wrap hs-overlay-open:translate-x-0 _sm:max-w-full px-12 _sm:px-8 sm hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full z-[80] bg-white border-e dark:bg-gray-800"
        role="dialog"
        tabindex="-1"
        aria-labelledby="base-overlay-label"
    >
        <div
            class="flex justify-between items-center pt-8"
        >
            <p
                class="text-black dark:text-primary-700 font-black text-2xl md:text-3xl lg:text-4xl"
            >
                {{title}}
            </p>
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
            <slot v-if="!useSheet" />

 <div class="self-end portrait:pt-0 pt-8 md:text-sm">
        <div
            class="pb-6 portrait:flex flex-col"
        >
         

            <div class="felx flex-col gap-4">
                <p v-if="subtitle" class="text-lg font-bold lg:text-xl">
                    {{ subtitle }}
                </p>
                <p v-if="description" class="text-sm lg:text-base text-gray-600">
                    {{ description }}
                </p>
            </div>
        </div>
        <slot />
    </div>

    </div>         
</template>
