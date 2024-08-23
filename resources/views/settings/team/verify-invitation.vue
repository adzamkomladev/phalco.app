<script setup lang="ts">
useHead({
    title: "Verify Team Invitation",
});

const props = defineProps<{
    success?: string;
    error?: string;
}>();
</script>

<template layout="auth">
    <div
        class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl dark:bg-gray-800 dark:border-gray-700"
    >
        <div class="p-4 sm:p-7">
            <div class="p-4 sm:p-10 text-center overflow-y-auto">
                <!-- Icon -->
                <span
                    v-if="props.success"
                    class="mb-4 inline-flex justify-center items-center size-[46px] rounded-full border-4 border-green-50 bg-green-100 text-green-500 dark:bg-green-700 dark:border-green-600 dark:text-green-100"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="36"
                        height="36"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="#000000"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-circle-check"
                    >
                        <circle cx="12" cy="12" r="10" />
                        <path d="m9 12 2 2 4-4" />
                    </svg>
                </span>
                <span
                    v-if="props.error"
                    class="mb-4 inline-flex justify-center items-center size-[46px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                </span>
                <!-- End Icon -->

                <h3
                    id="hs-task-created-alert-label"
                    class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200"
                >
                    {{ props.success || props.error }}
                </h3>
                <p
                    v-if="props.success"
                    class="text-gray-500 dark:text-neutral-500"
                >
                    Click on the button below to continue the homepage
                </p>

                <div class="mt-6 flex justify-center gap-x-4">
                    <router-link
                        v-if="props.success"
                        :href="route('home')"
                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                    >
                        Continue
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
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>
