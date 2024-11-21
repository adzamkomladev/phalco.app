<script setup lang="ts">
import BrowseImage from "~/resources/svg/share/browse.svg?src";

import HSFileUpload from "@preline/file-upload";

const fileUpload = ref<HTMLInputElement | null>(null);
const model = defineModel({ required: true });
const props = defineProps<{
    error?: string | null;
    fileTypes?: string | null;
    path?: string | null;
}>();
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
    });
    dropzone.on("removedfile", (_: any) => (model.value = null));
});

const fileUploadOptions = JSON.stringify({
    url: `/assets/upload?path=${props.path || "organizations"}`,
    acceptedFiles: props.fileTypes || ".xls,.xlsx,.csv",
    maxFiles: 1,
    extensions: {
        default: {
            class: "shrink-0 size-5",
        },
        xlsx: {
            icon: ``,
            class: "shrink-0 size-5",
        },
        zip: {
            class: "shrink-0 size-5",
        },
        csv: {
            icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="m5 12-3 3 3 3"/><path d="m9 18 3-3-3-3"/></svg>',
            class: "shrink-0 size-5",
        },
    },
});
</script>

<template>
    <div>
        <div ref="fileUpload" :data-hs-file-upload="fileUploadOptions">
            <template data-hs-file-upload-preview="">
                <div
                    class="p-3 bg-white border border-solid border-gray-300 rounded-xl dark:bg-gray-800 dark:border-gray-600"
                >
                    <div class="mb-1 flex justify-between items-center">
                        <div class="flex items-center gap-x-3">
                            <span
                                class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg dark:border-gray-700 dark:text-gray-500"
                                data-hs-file-upload-file-icon=""
                            >
                                <img
                                    class="rounded-lg hidden"
                                    data-dz-thumbnail=""
                                />
                            </span>
                            <div>
                                <p
                                    class="text-sm font-medium text-gray-800 dark:text-white"
                                >
                                    <span
                                        class="truncate inline-block max-w-[300px] align-bottom"
                                        data-hs-file-upload-file-name=""
                                    ></span
                                    >.<span
                                        data-hs-file-upload-file-ext=""
                                    ></span>
                                </p>
                                <p
                                    class="text-xs text-gray-500 dark:text-gray-500"
                                    data-hs-file-upload-file-size=""
                                ></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-x-2">
                            <button
                                type="button"
                                class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-gray-500 dark:hover:text-gray-200 dark:focus:text-gray-200"
                                data-hs-file-upload-remove=""
                            >
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
                                    <path d="M3 6h18"></path>
                                    <path
                                        d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"
                                    ></path>
                                    <path
                                        d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"
                                    ></path>
                                    <line
                                        x1="10"
                                        x2="10"
                                        y1="11"
                                        y2="17"
                                    ></line>
                                    <line
                                        x1="14"
                                        x2="14"
                                        y1="11"
                                        y2="17"
                                    ></line>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center gap-x-3 whitespace-nowrap">
                        <div
                            class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700"
                            role="progressbar"
                            aria-valuenow="0"
                            aria-valuemin="0"
                            aria-valuemax="100"
                            data-hs-file-upload-progress-bar=""
                        >
                            <div
                                class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500 hs-file-upload-complete:bg-green-500"
                                style="width: 0"
                                data-hs-file-upload-progress-bar-pane=""
                            ></div>
                        </div>
                        <div class="w-10 text-end">
                            <span class="text-sm text-gray-800 dark:text-white">
                                <span data-hs-file-upload-progress-bar-value=""
                                    >0</span
                                >%
                            </span>
                        </div>
                    </div>
                </div>
            </template>

            <div
                class="cursor-pointer p-12 flex justify-center bg-white border border-dashed border-gray-300 rounded-xl dark:bg-gray-800 dark:border-gray-600"
                data-hs-file-upload-trigger=""
            >
                <div class="text-center">
                    <span class="inline-flex justify-center items-center size-">
                        <img :src="BrowseImage" />
                    </span>

                    <div
                        class="mt-4 flex flex-wrap justify-center text-sm leading-6 text-gray-600"
                    >
                        <span
                            class="pe-1 font-medium text-gray-800 dark:text-gray-200"
                        >
                            Browse through your files and Drop your file here
                        </span>
                        <span
                            class="bg-white font-semibold text-blue-600 hover:text-blue-700 rounded-lg decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 dark:bg-gray-800 dark:text-blue-500 dark:hover:text-blue-600"
                            >browse</span
                        >
                    </div>

                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                        Maximum file size is 2 MB
                    </p>
                </div>
            </div>

            <div
                class="mt-4 space-y-2 empty:mt-0"
                data-hs-file-upload-previews=""
            ></div>
        </div>
        <p v-if="props.error" class="text-xs text-red-600 mt-2">
            {{ props.error }}
        </p>
    </div>
</template>
