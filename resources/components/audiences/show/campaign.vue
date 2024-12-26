<script setup lang="ts"></script>

<template>
    <!-- File Uploading Progress Form -->
    <div
        class="flex flex-col h-full bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700"
    >
        <!-- Body -->
        <div class="p-4 md:p-5 space-y-7">
            <div>
                <!-- Uploading File Content -->
                <div class="mb-2 flex justify-between items-center">
                    <div class="flex items-center gap-x-3">
                        <span
                            class="size-8 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg dark:border-neutral-700 dark:text-neutral-500"
                        >
                            <SharedCommonIcon name="upload" />
                        </span>
                        <div>
                            <p
                                class="text-sm font-medium text-gray-800 dark:text-white"
                            >
                                preline-ui.html
                            </p>
                            <p
                                class="text-xs text-gray-500 dark:text-neutral-500"
                            >
                                7 KB / 1Mb
                            </p>
                        </div>
                    </div>
                    <div class="inline-flex items-center gap-x-2">
                        <button
                            type="button"
                            class="relative text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                        >
                            <SharedCommonIcon name="pause" />

                            <span class="sr-only">Pause</span>
                        </button>
                        <button
                            type="button"
                            class="relative text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                        >
                            <SharedCommonIcon name="trash" />

                            <span class="sr-only">Delete</span>
                        </button>
                    </div>
                </div>
                <!-- End Uploading File Content -->

                <!-- Progress Bar -->

                <SharedCommonProgressBar
                    :progress="0"
                    :total="10"
                    height="8px"
                    unloadedClass="bg-gray-100"
                />
                <!-- End Progress Bar -->
            </div>
        </div>
        <!-- End Body -->

        <!-- Footer -->
        <div
            class="bg-gray-50 border-t border-gray-200 rounded-b-xl py-2 px-4 md:px-5 dark:bg-white/10 dark:border-neutral-700"
        >
            <div class="flex flex-wrap justify-between items-center gap-x-3">
                <div>
                    <span
                        class="text-sm font-semibold text-gray-800 dark:text-white"
                    >
                        3 left
                    </span>
                </div>
                <!-- End Col -->

                <div class="-me-2.5"></div>
                <!-- End Col -->
            </div>
        </div>
        <!-- End Footer -->
    </div>
    <!-- End File Uploading Progress Form -->
</template>
