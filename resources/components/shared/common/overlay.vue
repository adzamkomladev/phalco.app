<script setup lang="ts">
import { HSOverlay } from "preline/preline";
import { OverlayProps } from "~/resources/interfaces/shared/overrlay.interface";

const props = defineProps<OverlayProps>();

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

    overlayHandler.value.on("close", (_: any) => {
        close();
        unmount();
    });
});

watch(show, (newShow: boolean | undefined) => {
    overlayHandler.value?.close();
    if (newShow === undefined) return;
    newShow ? overlayHandler.value?.open() : overlayHandler.value?.close();
});

const getType = () => {
    if (props.type === "sidedrawer-center")
        return "hs-overlay-open:translate-x-0 translate-x-full fixed top-0 end-0 flex sm:items-center h-full ";
    else if (props.type === "modal-top")
        return "fixed top-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all flex justify-center w-full";
    else if (props.type === "modal-center")
        return "fixed top-0 hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-70 opacity-0 ease-in-out h-full transition-all duration-500 sm:w-screen flex items-center justify-center";
    else
        return "hs-overlay-open:translate-x-0 translate-x-full fixed top-0 end-0  h-full";
};

const positionClass = ref(getType());
</script>

<template>
    <div
        ref="overlay"
        id="base-overlay"
        class="hs-overlay _sm:w-full text-wrap text-gray-800 dark:text-gray-300 transition-all duration-300 transform z-[80] h-full bg-white dark:bg-gray-800"
        role="dialog"
        tabindex="-1"
        aria-labelledby="base-overlay-label"
        :class="[positionClass]"
    >
        <div class="max-w-screen _sm:w-full pt-8 h-screen flex flex-col">
            <div
                v-bind:class="
                    type === 'sidedrawer-center'
                        ? 'rounded-l-full  py-6 mb-4'
                        : 'mb-4'
                "
                v-if="!hideTitle"
                class="flex justify-between z-10 items-center px-10"
            >
                <p class="font-black text-2xl md:text-3xl">
                    {{ title }}
                </p>
                <button
                    type="button"
                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close"
                    data-hs-overlay="#base-overlay"
                >
                    <span class="sr-only">Close</span>
                    <SharedCommonIcon name="close" class="" />
                </button>
            </div>

            <slot v-if="hideTitle" name="title" />

            <div class="flex flex-col overflow-hidden flex-grow">
                <div
                    v-if="!useSheet"
                    class="overflow-y-auto px-10 max-h-[calc(100vh-80px)] min-h-full"
                >
                    <slot />
                </div>

                <div
                    v-if="useSheet"
                    class="sm:self-en px-10 z-50 pt-8 md:text-sm overflow-y-auto min-h-full max-h-[calc(100vh-80px)] pb-8"
                >
                    <div class="pb-6 portrait:flex flex-col">
                        <div class="flex flex-col gap-4">
                            <p
                                v-if="subtitle"
                                class="text-lg font-bold lg:text-xl"
                            >
                                {{ subtitle }}
                            </p>
                            <p
                                v-if="description"
                                class="text-sm lg:text-base text-gray-600"
                            >
                                {{ description }}
                            </p>
                        </div>
                    </div>
                    <div class="flex-grow overflow-y-auto overflow-x-hidden">
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
