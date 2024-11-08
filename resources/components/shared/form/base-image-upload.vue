<script setup lang="ts">
import HSFileUpload from "@preline/file-upload";

const fileUpload = ref<HTMLInputElement | null>(null);
const model = defineModel({ required: true });
const props = defineProps<{ error?: string | null }>();
const isUploaded = ref(false);

onMounted(() => {
    // Initialize File Upload
    HSFileUpload.autoInit();

    // Retrieve element and dropzone instances
    const { element } = HSFileUpload.getInstance(
        fileUpload.value!,
        true,
    ) as any;
    const { dropzone } = element;

    // Listen to dropzone events
    dropzone.on("complete", (file: any) => {
        const responseData = JSON.parse(file.xhr.responseText);
        model.value = responseData.url;
        isUploaded.value = true;
    });
    dropzone.on("removedfile", (_: any) => {
        model.value = null;
    });
    isUploaded.value = false;
});

const fileUploadOptions = JSON.stringify({
    url: "/assets/upload?path=organizations",
    acceptedFiles: "image/*",
    maxFiles: 1,
    singleton: true,
});
</script>

<template>
    <div>
        <div
            class="relative"
            ref="fileUpload"
            :data-hs-file-upload="fileUploadOptions"
        >
            <template data-hs-file-upload-preview="">
                <div class="size-24">
                    <img
                        class="w-full aspect-square overflow-hidden object-contain border rounded-full"
                        data-dz-thumbnail=""
                    />
                </div>
            </template>

            <div class="flex group flex-wrap items-center gap-3 sm:gap-5">
                <div
                    class=""
                    data-hs-file-upload-previews=""
                    data-hs-file-upload-pseudo-trigger=""
                >
                    <span
                        class="group-has-[img]:hidden flex shrink-0 justify-center items-center size-24 border-2 border-dotted border-gray-300 text-gray-400 cursor-pointer rounded-full hover:bg-gray-50 dark:border-gray-700 dark:text-gray-600 dark:hover:bg-gray-700/50"
                    >
                        <svg
                            class="shrink-0 size-7"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="10" r="3"></circle>
                            <path
                                d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"
                            ></path>
                        </svg>
                    </span>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <button
                            type="button"
                            class="py-2 transition-all px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-md border border-transparent bg-primary-500 dark:bg-primary-800 hover:opacity-90 focus:outline-none focus:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-file-upload-trigger=""
                        >
                            <svg
                                class="shrink-0 size-4"
                                xmlns="http://www.w3.org/2000/svg"
                                width="36"
                                height="36"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path
                                    d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"
                                ></path>
                                <polyline points="17 8 12 3 7 8"></polyline>
                                <line x1="12" x2="12" y1="3" y2="15"></line>
                            </svg>
                            Upload logo
                        </button>
                        <button
                            type="button"
                            class="size-7 items-center pb-[2px] justify-center aspect-square absolute bottom-[66px] font-black left-[66px] opacity-100 delay-75 hidden group-has-[img]:inline-flex group-has-[img]:opacity-100 transition-all text-sm rounded-full border-3 border-white bg-red-600 text-white leading-[0] hover:bg-opacity-90 hover:scale-110 focus:outline-none focus:bg-gray-50 disabled:pointer-events-none dark:bg-red-900 dark:border-gray-700 dark:text-gray-400 dark:focus:bg-red-800"
                            data-hs-file-upload-clear=""
                        >
                            x
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <p v-if="props.error" class="text-xs text-red-600 mt-2">
            {{ props.error }}
        </p>
    </div>
</template>
